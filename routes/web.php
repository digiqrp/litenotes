<?php

    use App\Http\Controllers\WelcomeController;
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

Route::get('/',[WelcomeController::class,'index']);

Route::get('/home', function () {
    return view('home',['name'=>'Mark Gregory']);
});

Route::get('/about',function(){
   return view('about');
});


Route::get('/generate/password',function (){
    return bcrypt('123456789');
});
