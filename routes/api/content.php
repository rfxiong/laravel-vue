<?php

//api分路由表
//标签路由
Route::get('tags', 'Api\ContentController@tags');
//获取课程路由
Route::get('lesson/{tid}', 'Api\ContentController@lesson');
//推荐课程
Route::get('commentLesson/{row}', 'Api\ContentController@commentLesson');
//热门课程
Route::get('hotLesson/{row}', 'Api\ContentController@hotLesson');
//课程视频列表
Route::get('videos/{lessonid}', 'Api\ContentController@videos');