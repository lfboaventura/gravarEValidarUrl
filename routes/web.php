<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('verified');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
    return view('auth.login');
})->name('logout');

Auth::routes(['verify' => true]);

Route::group(
    ['before' => 'auth'],
    function(){
        Route::get('/accounts1', function () {
            return view('auth.login');
        });            
    }
);

Route::group(['middleware' => ['auth','verified']], function(){
    Route::group(['namespace' => 'Admin', 'prefix' => '/' ], function(){
        Route::get('/',                         'HomeController@index')                 ->name('home');
        Route::get('/home',                     'HomeController@index')                 ->name('admin.home');
        Route::get('profile',                   'UserController@profile')               ->name('profile');
        Route::post('profile',                  'UserController@profileUpdate')         ->name('profile');

        Route::get('url/all',                   'UrlController@all')                    ->name('url.all');
        Route::get('url',                       'UrlController@index')                  ->name('url.index');
        Route::get('url/create',                'UrlController@create')                 ->name('url.create');
        Route::post('url',                      'UrlController@store')                  ->name('url.store');
        Route::get('url/{id}',                  'UrlController@show')                   ->name('url.show');
        Route::get('url/{id}/edit',             'UrlController@edit')                   ->name('url.edit');
        Route::put('url/{id}',                  'UrlController@update')                 ->name('url.update');
        Route::get('url/destroy/{id}',          'UrlController@destroy')                ->name('url.destroy');

        Route::get('urlStatus/all',             'UrlStatusController@all')              ->name('urlStatus.all');
        Route::get('urlStatus',                 'UrlStatusController@index')            ->name('urlStatus.index');
        Route::get('urlStatus/list',            'UrlStatusController@getList')          ->name('urlStatus.getList');


        // Route::resource('url', 'UrlController', ['only' => ['index', 'show']]);
        // Route::resource('url', 'UrlController', ['except' => ['create', 'store', 'update', 'destroy']]);

        
    });

        // Route::get('url',                       'UrlController@index')                  ->name('url.index');
        // Route::get('url/create',                'UrlController@create')                 ->name('url.create');
        // Route::get('url/store',                'UrlController@create')                 ->name('url.create');

    // Route::group(['namespace' => 'Client', 'prefix' => 'bankSlip' ], function(){
    //     Route::get('/',                         'BankSlipController@index')             ->name('bankSlip');
    //     Route::get('bankSlip/all',              'BankSlipController@all')               ->name('bankSlip.all');
    //     Route::get('getBankKeys',               'BankSlipController@getBankKeys')       ->name('getBankKeys');
    //     Route::get('allBankKey',                'BankSlipController@allBankKey')        ->name('allBankKey');
    // });

    // Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ], function(){
    //     Route::get('config',                    'ConfigController@index')               ->name('config');
    //     Route::post('config',                   'ConfigController@update')              ->name('config');

    //     Route::get('user',                      'UserController@index')                 ->name('user');
    //     Route::post('user',                     'UserController@update')                ->name('user');
    //     Route::get('users',                     'UserController@list')                  ->name('user.list');
    //     Route::get('user/all',                  'UserController@all')                   ->name('user.all');
    //     Route::get('user/edit/{id}',            'UserController@edit')                  ->name('user.edit');
    //     Route::get('user/delete/{id}',          'UserController@destroy')               ->name('user.delete');

    //     Route::get('client',                    'ClientController@index')               ->name('client');
    //     Route::post('client',                   'ClientController@update')              ->name('client');
    //     Route::get('clients',                   'ClientController@list')                ->name('client.list');
    //     Route::get('clients/all',               'ClientController@all')                 ->name('client.all');
    //     Route::get('client/edit/{id}',          'ClientController@edit')                ->name('client.edit');
    //     Route::get('client/delete/{id}',        'ClientController@destroy')             ->name('client.delete');

    // });
});
/*
Route::get('/home', 'HomeController@index')->name('home');
*/

