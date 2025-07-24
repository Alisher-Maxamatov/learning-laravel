<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/haa', function (){
//    return 'name';
//});
//shunchaki route yaratish

//Route::get('/aa/{bb}', function ($bb){
//    return 'name '.$bb;
//});
// route va uning parametri


//Route::get('/aa/{bb??}', function ($bb=null){
//    return 'name '.$bb;
//});
// routega parametr berish ixtiyoriy parametr perilmasa ham sikl davom etaveradi


//Route::get('/hello/{name?}', function ($name=null){
//   return 'hello,'.$name;
//});
//
//Route::get('/search',function (\http\Client\Request $request){
//    $name = $request->get('name','Shaxzod');
//    $age = $request->get('age',23);
//    return $name. 'ismli foydalanuvchi,'.$age. 'yoshda';
//});
//
//Route::get('/{action}/{name?})', function ($action,$name=null){
//    return $action.$name;
//});
//bu requestlar bilan ishlashga //


//Route::group(['prefix'=>'dashboard'],function (){
//    Route::get('/users', function (){
//       return 'Users dashboard';
//    });
//    Route::get('/statistic', function (){
//        return 'Statistic dashboar';
//    });
//});
Route::get('/show/{id}',\App\Http\Controllers\ShowProfileController::class);
//Route::get('/user/{id?}',[\App\Http\Controllers\UserController::class,'show']);
Route::get('/user',[UserController::class,'list']);
