<?php

namespace App\Providers;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Services\GraphQlClient;
use Illuminate\Support\ServiceProvider;

class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GraphQlClientProvider::class, GraphQlClient::class);
        $this->app->when(GraphQlClient::class)
            ->needs('$endpointUrl')
            ->give(config('rick-and-morty-graphql-client.graphql.client.base_uri'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
