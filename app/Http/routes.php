<?php


Route::get('/', function () {
    return view('welcome');
});

/*collect all sermons*/
Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => 'admin'], function () {

    /*all sermons*/
    Route::get('sermons', 'SermonsApiController@allSermonsData');
    Route::get('sermon/edit/{slug}', 'SermonsApiController@sermonEdit');
    Route::patch('sermon/{slug}', 'SermonsApiController@sermonEditSave');
    Route::get('sermons/paginated', 'SermonsApiController@allSermonsPaginated');
    Route::delete('sermon/delete/{sermon}', 'SermonsApiController@destroy');
    Route::get('sermoncategory/{slug}', 'SermonsApiController@oneSermonCategory');
    Route::get('sermonservice/{slug}', 'SermonsApiController@oneSermonService');
    /*all categories*/
    Route::get('category', 'CategoriesApiController@allCategoriesData');
    Route::patch('category/{slug}', 'CategoriesApiController@categoryEditSave');
    Route::get('category/paginated', 'CategoriesApiController@allCategoriesPaginated');
    Route::get('{category}/sermons', 'CategoriesApiController@categorySermonsData');
    Route::post('category/new', 'CategoriesApiController@newCategoryData');
    Route::delete('category/delete/{category}', 'CategoriesApiController@destroy');
    /*all preachers*/
    Route::get('preachers', 'PreachersApiController@allPreachersData');
    Route::get('preacher/paginated', 'PreachersApiController@allPreachersPaginated');
    Route::get('{preacher}/sermons', 'PreachersApiController@preacherSermonsData');
    Route::post('preacher/new', 'PreachersApiController@newpreacherData');
    Route::delete('preacher/delete/{preacher}', 'PreachersApiController@destroy');
    /*all services*/
    Route::get('services', 'ServicesApiController@allServicesData');
    Route::patch('service/{slug}', 'ServicesApiController@serviceEditSave');
    Route::get('service/paginated', 'ServicesApiController@allServicesPaginated');
    Route::get('{service}/sermons', 'ServicesApiController@serviceSermonsData');
    Route::post('service/new', 'ServicesApiController@newserviceData');
    Route::delete('service/delete/{service}', 'ServicesApiController@destroy');
    /*all users*/
    Route::get('users', 'UsersApiController@allUsersData');
    Route::get('users/paginated', 'UsersApiController@allUsersPaginated');
    Route::delete('user/delete/{user}', 'UsersApiController@destroy');
    Route::get('statuses', 'UsersApiController@allStatusData');
    /*all admins*/
    Route::get('admins', 'AdminsApiController@allAdminsData');
    Route::get('admins/paginated', 'AdminsApiController@allAdminsPaginated');
    Route::delete('admin/delete/{admin}', 'AdminsApiController@destroy');
    Route::get('statuses', 'AdminsApiController@allStatusData');

});


Route::auth();
Route::get('/home', 'HomeController@index')->name('userhome_path');

//Login Routes...
Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login','AdminAuth\AuthController@login');
Route::get('/admin/logout','AdminAuth\AuthController@logout');
// Registration Routes...
Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\AuthController@register');
// Recovery and Reset Routes...
Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

//Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('dashboard_path');
    Route::get('/admin/admins', 'AdminController@allAdminsPage')->name('adminsPage_path');

});

/*sermon routes*/
Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/sermons', 'SermonsController@allSermonsPage')->name('allsermons_path');
    /*use the 2 routes below to upload new sermon*/
    Route::get('admin/sermon/new', 'SermonsController@create')->name('sermoncreate_path');
    Route::post('admin/sermon/new', 'SermonsController@store')->name('sermonstore_path');
    /*show more info about this sermon*/
    Route::get('/sermon/details/{slug}', 'SermonsController@show')->name('sermondetails_path');
    /*use the 2 routes below to update a sermon*/
    Route::get('/sermon/edit/{slug}', 'SermonsController@edit')->name('sermonedit_path');
    Route::patch('/sermon/{slug}', 'SermonsController@update')->name('sermonupdate_path');

});

//use route below to download sermon **NOT PROTECTED**
Route::get('/sermon/{filename}', 'SermonsController@download');

/*category routes*/
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/category', 'CategoriesController@allCategoriesPage')->name('categoriespage_path');
});

/*preacher routes*/
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/preachers', 'PreachersController@allPreachersPage')->name('preacherpage_path');
});

/*service routes*/
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/services', 'ServicesController@allServicesPage')->name('servicepage_path');
});


/*user management routes*/
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/users', 'UsersController@allUsersPage')->name('allusers_path');
    Route::post('/admin/user/new', 'UsersController@store')->name('userstore_path');
    Route::get('/user/details/{slug}', 'UsersController@show')->name('userdetails_path');
    Route::get('/user/edit/{slug}', 'UsersController@edit')->name('useredit_path');
    Route::patch('/user/{slug}', 'UsersController@update')->name('userupdate_path');
}); 

/*admin routes for managing requests*/
Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/sermonrequests', 'SermonrequestsController@index')->name('allsermonrequests_path');
    Route::get('/sermonrequest/delete/{$slug}', 'SermonrequestsController@destroy')->name('sermonrequestdelete_path');
    Route::get('/sermonrequest/details/{slug}', 'SermonrequestsController@show')->name('sermonrequestdetails_path');

});


/*User routes for making requests*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/details/{slug}', 'HomeController@show')->name('profiledetails_path');
    Route::get('/profile/edit/{slug}', 'HomeController@edit')->name('profileedit_path');
    Route::patch('profile/{slug}', 'HomeController@update')->name('profileupdate_path');
    Route::get('/sermonrequest/new', 'SermonrequestsController@create')->name('sermonrequestcreate_path');
    Route::post('/sermonrequest/new', 'SermonrequestsController@store')->name('sermonrequeststore_path');

});


