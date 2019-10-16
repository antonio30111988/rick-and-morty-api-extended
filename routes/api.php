<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* @var Router $router */

use Illuminate\Routing\Router;


Route::group([
    'prefix' => 'v1',
    'middleware' => 'log-api-requests',
    'as'=>'api.'
], function ()  use ($router) {

    // Showing all information of a character (Name, species, gender, last location, dimension, etc)
    Route::get(
        '/characters/{id}',
        'CharactersController@show'
    )->name('character_details');

    //Show all characters that partake in a given episode
    Route::get(
        '/episodes/{id}/characters',
        'EpisodeCharactersController'
    )->name('episode_characters');

    //Show all characters that exist (or are last seen) at a given location
    Route::get(
        '/locations/{id}/characters',
        'LocationsController@getLocationCharacters'
    )->name('location_characters');

    //Show all characters that exist (or are last seen) in a given dimension
    Route::post(
        '/locations/characters/filter/dimension',
        'LocationsController@getLocationDimensionCharacters'
    )->name('dimension_characters');

});