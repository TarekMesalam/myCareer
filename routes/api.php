<?php

use Illuminate\Http\Request;

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

Route::get('categories', 'Admin\AdminJobCategoryController@getAllCategories');
Route::get('jobs', 'Admin\AdminJobsController@getAllJobs');
Route::get('jobs/{categoryId}', 'Admin\AdminJobsController@getJobsByCategoryId');
Route::get('jobs-details/{jobId}', 'Admin\AdminJobsController@getJobsById');
Route::post('job-apply', 'Front\FrontJobsController@postApplication');

//V2 API
Route::get('v2/categories', 'Admin\AdminJobCategoryController@getAllCategoriesV2');
Route::get('v2/latestjobs', 'Admin\AdminJobsController@getLatestJobsV2');
Route::get('v2/jobs', 'Admin\AdminJobsController@getAllJobsV2');
Route::get('v2/jobs/{categoryId}', 'Admin\AdminJobsController@getJobsByCategoryIdV2');
Route::get('v2/jobs-details/{jobId}', 'Admin\AdminJobsController@getJobsByIdV2');
Route::post('v2/job-apply', 'Front\FrontJobsController@postApplicationV2');
