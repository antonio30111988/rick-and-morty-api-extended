<?php

namespace App\Http\Controllers\Auth;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use GraphQL\Client;
use GraphQL\Exception\QueryError;
use GraphQL\QueryBuilder\QueryBuilder;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function test(GraphQlClientProvider $client)
    {

// Create Client object to contact the GraphQL endpoint
//        $client = new Client(
//            'https://graphql-pokemon.now.sh/',
//            []  // Replace with array of extra headers to be sent with request for auth or other purposes
//        );

// Create the GraphQL query
        $builder = (new QueryBuilder('pokemon'))
            ->setArgument('name', 'Pikachu')
            ->selectField('id')
            ->selectField('number')
            ->selectField('name')
            ->selectField(
                (new QueryBuilder('attacks'))
                    ->selectField(
                        (new QueryBuilder('special'))
                            ->selectField('name')
                            ->selectField('type')
                            ->selectField('damage')
                    )
            )
            ->selectField(
                (new QueryBuilder('evolutions'))
                    ->selectField('id')
                    ->selectField('name')
                    ->selectField('number')
                    ->selectField(
                        (new QueryBuilder('attacks'))
                            ->selectField(
                                (new QueryBuilder('fast'))
                                    ->selectField('name')
                                    ->selectField('type')
                                    ->selectField('damage')
                            )
                    )
            );

// Run query to get results
        try {
            $results = $client->runQuery($builder);
        }
        catch (QueryError $exception) {

            // Catch query error and desplay error details
            print_r($exception->getErrorDetails());
            exit;
        }

// Display original response from endpoint
      //  var_dump($results->getResponseObject());

// Display part of the returned results of the object
     //   var_dump($results->getData()->pokemon);

// Reformat the results to an array and get the results of part of the array
        $results->reformatResults(true);
      //  print_r($results->getData()['pokemon']);

        return response()->json(($results->getData()['pokemon']));
    }
}
