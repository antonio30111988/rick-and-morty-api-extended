<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\Traits;

use App\Http\Converters\ToApiModelConverterContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait CrudControllerTrait
{
    use ErrorResponse;
    /**
     * @var ToApiModelConverterContract
     */
    private $converter;
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $select = $request->input('select', ['*']);
        $with = $request->input('with', []);
        $sort = $request->input('sort', '');
        $limit = $request->input('limit', 0);
        $collection = $this->repository->all($select, $with, $sort, (int)$limit);
        if ($this->converter instanceof ToApiModelConverterContract) {
            return response()->json($this->converter->fromCollectionOfDbModels($collection));
        }
        return response()->json($collection);
    }

    /**
     * @param int     $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show(int $id, Request $request): JsonResponse
    {
        try {
            $with = array_filter(explode(',', $request->input('included', '')));
            $model = $this->repository->findById($id, $with);
            if ($this->converter instanceof ToApiModelConverterContract) {
                return response()->json($this->converter->fromDbModel($model));
            }
            return response()->json($model);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse($e, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, $this->validationRules);
        if ($this->converter instanceof ToApiModelConverterContract) {
            $apiModel = $this->converter->getApiModel();
            $apiModel->setFromJson(json_decode($request->getContent()));
            $model = $this->converter->toDbModel($apiModel, $this->repository->new());
        } else {
            $model = $this->repository->new($request->toArray());
        }
        $this->repository->save($model);
        if ($this->converter instanceof ToApiModelConverterContract) {
            return response()->json($this->converter->fromDbModel($model));
        }
        return response()->json($model);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $model = $this->repository->findById($id);
            $this->validate($request, $this->validationRules);
            if ($this->converter instanceof ToApiModelConverterContract) {
                $apiModel = $this->converter->getApiModel();
                $apiModel->setFromJson(json_decode($request->getContent()));
                $model = $this->converter->toDbModel($apiModel, $model);
            } else {
                $model->fill($request->all());
            }
            $this->repository->save($model);
            if ($this->converter instanceof ToApiModelConverterContract) {
                return response()->json($this->converter->fromDbModel($model));
            }
            return response()->json($model);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse($e, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $model = $this->repository->findById((int)$id);
        $this->repository->delete($model);
        return response()->json('success');
    }
}
