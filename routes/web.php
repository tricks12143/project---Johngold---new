<?php

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

Route::get('/', 'CreateController@home');
//Route::get('/dashboard', 'CreateController@dashboard');
Route::get('/dashboard/edittask', function(){
	return view('admin/edittask');
});



Route::get('/pages/{id}', 'CreateController@viewpages');



/*Route::post('/dashboard/insertcontentsub', function(){
	var_dump(Request::input('contents'));
	for($i=0; $i<count(Request::input('contents')); $i++){
		echo $str[] = Request::input('contents')[$i];
	}
});*/


Route::get('/send_msg', 'ChatController@set_msg_chat');
Route::get('/get_staff', 'ChatController@get_staff_msg_chat');
Route::get('/get_msg', 'ChatController@get_msg_chat');
Route::get('/leaveconversation', 'ChatController@leaveconversation');

//Route::get('/login', 'CreateController@login');
Route::get('/signup', 'CreateController@signup');
//Route::get('/logout', 'CreateController@logout');

Route::post('/logmein', 'CreateController@loginfunction');
Route::post('/signmeup', 'CreateController@signupfunction');



Route::group(['middleware' => ['web']], function(){
	Route::get('/login', ['as' => 'login', 'uses' => '\App\Http\Controllers\Auth\LoginController@login']);
	Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => '\App\Http\Controllers\Auth\LoginController@handleLogin']);
	Route::get('/dashboard', ['middleware' => 'auth','as' => 'dashboard', 'uses' => 'UsersController@dashboard']);
	Route::get('/logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Auth\LoginController@logout']);
	Route::resource('/users', 'UsersController', ['only' => ['create', 'store']]);
	Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'CreateController@dashboard']);
	Route::post('/forgotpassword', ['as' => 'forgotpassword', 'uses' => '\App\Http\Controllers\Auth\ForgotPasswordController@forgotpassword']);
	Route::post('/handleforgot', ['as' => 'handleforgot', 'uses' => '\App\Http\Controllers\Auth\ForgotPasswordController@handleforgot']);
	Route::get('/handleforgotsubmit', ['as' => 'handleforgotsubmit', 'uses' => '\App\Http\Controllers\Auth\ForgotPasswordController@handleforgotsubmit']);
	Route::get('/changepassword', function(){
		return view('changepassword');
	});
	Route::get('/handlepasschange', ['as' => 'handlepasschange', 'uses' => '\App\Http\Controllers\Auth\ForgotPasswordController@handlepasschange']);

	Route::post('/inserttask', ['middleware' => 'auth', 'uses' => 'CreateController@addtask']);
	Route::get('/updatetask/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatetask']);
	Route::post('/edittask/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@edittask']);
	Route::get('/viewtask/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@viewtask']);
	Route::get('/deletetask/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletetask']);

	Route::get('/dashboard/pages', ['middleware' => 'auth', 'uses' => 'CreateController@menulist']);
	Route::post('/insertmenu', ['middleware' => 'auth', 'uses' => 'CreateController@addmenu']);
	Route::get('/dashboard/updatepage/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatepage']);
	Route::post('/editpage/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@editpage']);
	Route::post('/dashboard/updatecontentvalue', ['middleware' => 'auth', 'uses' => 'CreateController@updatecontentvalue']);
	Route::get('/deletemenu/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletemenu']);

	Route::post('/insertcomment', ['middleware' => 'auth', 'uses' => 'CreateController@addcomment']);
	Route::get('/updatecomment/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatecomment']);
	Route::post('/editcomment/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@editcomment']);
	Route::get('/viewcomment/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@viewcomment']);
	Route::get('/deletecomment/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletecomment']);


	Route::get('/dashboard/setup', ['middleware' => 'auth', 'uses' => 'CreateController@setup']);
	Route::post('/insertcontent', ['middleware' => 'auth', 'uses' => 'CreateController@insertcontent']);
	Route::get('/dashboard/updatecontent/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatecontent']);
	Route::post('/editcontent/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@editcontent']);
	Route::get('/deletecontent/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletecontent']);

	Route::post('/dashboard/insertpagetype', ['middleware' => 'auth', 'uses' => 'CreateController@insertpagetype']);
	Route::get('/dashboard/updatepagetype/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatepagetype']);
	Route::post('/editpagetype/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@editpagetype']);
	Route::get('/deletepagetype/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletepagetype']);

	Route::get('/dashboard/newsletter', ['middleware' => 'auth', 'uses' => 'CreateController@getnewsletter']);
	Route::post('/insertnews', ['middleware' => 'auth', 'uses' => 'CreateController@addnewsletter']);
	Route::get('/dashboard/updatenewletter/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatenewletter']);
	Route::post('/editnewsletter/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@editnewsletter']);
	Route::post('/dashboard/updatenewscontentvalue', ['middleware' => 'auth', 'uses' => 'CreateController@updatenewscontentvalue']);
	Route::get('/deletemenunews/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deletemenunews']);


	Route::get('/dashboard/editpage/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@vieweditpages']);

	Route::post('/dashboard/insertcontentsub', ['middleware' => 'auth', 'uses' => 'CreateController@insertcontentsub']);

	Route::post('/dashboard/insertcontentvalue', ['middleware' => 'auth', 'uses' => 'CreateController@insertcontentvalue']);

	Route::get('/dashboard/staff', ['middleware' => 'auth', 'uses' => 'CreateController@viewstaff']);

	Route::get('/confirm/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@confirmstaff']);
	
	Route::get('/deleteconfirmation/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@deleteconfirmation']);

	Route::get('/dashboard/updatemystaff/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@updatemystaff']);

	Route::get('/changestat', ['middleware' => 'auth', 'uses' => 'CreateController@changestat']);

	Route::get('/dashboard/settings/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@accountsettings']);

	Route::post('/edituser/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@edituser']);

	Route::post('/edituserstat/{id}', ['middleware' => 'auth', 'uses' => 'CreateController@edituserstat']);

	Route::get('/get_user_msg', ['middleware' => 'auth', 'uses' => 'ChatController@get_user_msg']);

	Route::get('/get_chatbox', ['middleware' => 'auth', 'uses' => 'ChatController@get_dynamic_chatbox']);

	Route::get('/leavethisconvers/{id}', ['middleware' => 'auth', 'uses' => 'ChatController@leavethisconvers']);

	Route::get('/adminleavecon', ['middleware' => 'auth', 'uses' => 'ChatController@adminleavecon']);

	Route::get('/get_user_chat_list', ['middleware' => 'auth', 'uses' => 'ChatController@getchatlist']);
});

