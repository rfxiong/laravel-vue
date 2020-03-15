<?php 
//admin后台路由

//后台登录路由
Route::get('admin/login','Admin\EntryController@login')->name('admin.login');
Route::post('admin/check','Admin\EntryController@check')->name('admin.check');
Route::get('admin/logout','Admin\EntryController@logout')->name('admin.logout');
Route::get('admin/index','Admin\EntryController@index')->name('admin.index');
//后台用户管理路由
Route::resource('admin/admins','Admin\AdminController')->only(['index','store','update','destroy']);
//后台角色管理路由
Route::resource('admin/roles','Admin\RoleController')->only(['index','store','update','destroy']);
Route::get('admin/roles/permission/{id}','Admin\RoleController@permission')->name('roles.permission');
Route::post('admin/roles/permission/{id}','Admin\RoleController@permissionStore');
//后台权限管理路由
Route::resource('admin/permissions','Admin\PermissionController')->only(['index','store','update','destroy']);
//栏目管理路由
Route::resource('admin/categories','Admin\CategoryController')->only(['index','edit','store','update','destroy']);
//文章管理路由
Route::resource('admin/articles','Admin\ArticleController');
//课程管理路由
Route::resource('admin/lessons','Admin\LessonController');
//文件上传路由
Route::post('admin/upload','Admin\UploadController@upload')->name('admin.upload');
//视频管理路由
Route::resource('admin/videos','Admin\VideoController');
//标签管理
Route::resource('admin/tags', 'Admin\TagController');

//课后练习用临时路由
Route::get('admin/insert', 'Admin\AdminController@insert');
Route::resource('admin/mydbs', 'Admin\MydbController')->only(['index','store','update','destroy']);