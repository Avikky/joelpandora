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
Auth::routes();

Route::get('/', 'PagesController@index');
Route::get('/blog', 'PagesController@showBlogPosts')->name('show.blog');
Route::get('/blogcategory/{id}/{category}', 'PagesController@showBlogCategory')->name('blog.category');
Route::post('/contactmail', 'PagesController@contactmail')->name('contactmail');
Route::get('/blogpost/{slug}', 'PagesController@blogPost')->name('blog.single');

//Post Route
Route::group(array('prefix' => 'admin/'), function(){
    //Projects segment route
    Route::get('project', 'ProjectsController@project');
    Route::post('project', 'ProjectsController@store');
    Route::put('project/{id}', 'ProjectsController@update');
    Route::delete('project/{id}', 'ProjectsController@destroy');

    //Profile route
    Route::get('profile', 'ProfileController@profile');
    Route::post('profile', 'ProfileController@store');
    Route::put('profile/{id}', 'ProfileController@update');
    Route::delete('profile/{id}', 'ProfileController@destroy');

    //Experience segment routes
    Route::get('experience', 'ExperienceController@experience');
    Route::post('experience', 'ExperienceController@store');
    Route::put('experience/{id}', 'ExperienceController@update');
    Route::delete('experience/{id}', 'ExperienceController@destroy');

    //s segment route
    Route::get('education', 'EducationController@education');
    Route::post('education', 'EducationController@store');
    Route::put('education/{id}', 'EducationController@update');
    Route::delete('education/{id}', 'EducationController@destroy');

    //Skills segment route
    Route::get('skills', 'SkillController@skills');
    Route::post('skills', 'SkillController@store');
    Route::put('skills/{id}', 'SkillController@update');
    Route::delete('skills/{id}', 'SkillController@destroy');

    //services segment route
    Route::get('services', 'ServicesController@services');
    Route::post('services', 'ServicesController@store');
    Route::put('services/{id}', 'ServicesController@update');
    Route::delete('services/{id}', 'ServicesController@destroy');

    //category segment route
    Route::get('category', 'CategoriesController@category');
    Route::post('category', 'CategoriesController@store');
    Route::put('category/{id}', 'CategoriesController@update');
    Route::delete('category/{id}', 'CategoriesController@destroy');

    //Tags segment route
    Route::get('tags', 'TagController@tags');
    Route::post('tags', 'TagController@store');
    Route::put('tags/{id}', 'TagController@update');
    Route::delete('tags/{id}', 'TagController@destroy');

    // Products route
    Route::get('product', 'ProductController@product');
    Route::post('product', 'ProductController@store');
    Route::put('product/{id}', 'ProductController@update');
    Route::delete('product/{id}', 'ProductController@destroy');

    // Admin Home page routes
    Route::get('dashboard', 'adminController@dashboard');

    //Gallery segment route
    Route::get('gallery', 'GalleryController@gallery');
    Route::post('gallery', 'GalleryController@store');
    Route::put('gallery/{id}', 'GalleryController@update');
    Route::delete('gallery/{id}', 'GalleryController@destroy');
    
    //site settings route
    Route::get('settings', 'SettingsController@settings');
    Route::post('settings', 'SettingsController@store')->name('storeSettings');
    Route::put('settings/{id}', 'SettingsController@update')->name('updateSettings');
});

//Post Route
Route::group(array('prefix' => 'admin/posts'), function(){
    Route::get('/', 'PostsController@index')->name('allpost');
    Route::get('/create', 'PostsController@showAddPost')->name('showAddPost');
    Route::post('/create', 'PostsController@store')->name('storepost');
    Route::get('/edit/{id}', 'PostsController@editpost')->name('editpost');
    Route::put('/edit/{id}', 'PostsController@update')->name('updatepost');
    Route::delete('index/{id}', 'PostsController@destroy');
    //Draft route
    Route::get('/draft', 'PostsController@draft')->name('draft');
    Route::put('/draft/{id}', 'PostsController@publish')->name('publishdraft');
});

Auth::routes();


