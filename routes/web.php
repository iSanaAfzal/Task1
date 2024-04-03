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
    return view('welcome');
});
//Route Returning String
Route::get('about',function(){
    return "Hello World";
});
//Route Parameter
Route::get('/user/{u_id}',function($id){
return $id;
});
//Multiple Parameter
Route::get('/post/{post_id}/comment/{comment_id}',function($post_id,$comment_id){
return $post_id.$comment_id;
});
//Optional Parameter
Route::get('/student/{name?}',function($name=null){
return "Hello".$name;
});
//Optional Parameter without null
Route::get('/student/{name?}',function($name=sana){
return "Hello".$name;
});
// without Optional Parameter means mandatory value given
Route::get('/student/{name}',function($name=null){
return "Hello".$name;
});//Return Not Found ERROR
//Regular Expression with constraint
Route::get('/product/{p_name}',function($name){
return "Product Name:".$name;
})->where('p_name','[A-Za-z]+');
//Multiple Regular  RejixExpression with constraint
Route::get('/manager/{id}/{name}',function($id,$name){
return "Manager ID:".$id."Manager Name:".$name;
})->where(['id'=>'[0-9]+','name'=>'[a-z]+']);
//Another Method Helper method Expression with constraint
Route::get('/employee/{id}/{name}',function($id,$name){
return "employee ID:".$id."Employee Name:".$name;
})->whereNumber('id')->whereAlpha('name');
//******where**********/
Route::get('/{string}',function(){
return view ('Hello WOrld 234');
})->where('string','XYZ');

//***********whereIn************
Route::get('/{gender}',function(){
return view ('index');
})->whereIn('gender',['male','female']);
//******whereNumber**********/
Route::get('/{id}',function(){
return view ('index');
})->whereNumber('id');
//******whereAlphaNumeric**********/
Route::get('/{name}',function(){
return view ('index');
})->whereAlphaNumeric('name');
