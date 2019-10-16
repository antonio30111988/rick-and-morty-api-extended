<?php

/*
|--------------------------------------------------------------------------
| GraphQl API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Graph QL extendedAPI!
|
*/

Route::group([
    'prefix' => 'v1',
    'middleware' => 'log-graphql-requests',
    'as'=>'graphql.'
], function () {

    // Showing all information of a character (Name, species, gender, last location, dimension, etc)
    Route::get(
        '/character/{id}',
        'CharacterController'
    )->name('character');

    //Show all characters that partake in a given episode
    Route::get(
        '/episode/{id}/characters',
        'EpisodeCharactersController'
    )->name('episode_characters');

    //Show all characters that exist (or are last seen) at a given location
    Route::get(
        '/location/{id}/characters',
        'LocationCharactersController'
    )->name('location_characters');

    //Show all characters that exist (or are last seen) in a given dimension
    Route::post(
        '/locations/characters/filter/dimension',
        'LocationDimensionCharactersController'
    )->name('dimension_characters');

});



