<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Lesson;
use App\Admin\Video;
use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;

class LessonController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::paginate(env('PAGE_SIZE'));
        return view('admin.lesson.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create_and_edit');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        //Create方法添加后返回一个类实例，用该实例去关联表插值
        $lesson = Lesson::create($request->except(['_token','videos']));
        //把接受到的videos json格式转数组，并逐个插入videos表中
        $videos = json_decode($request['videos'],true);
        foreach ($videos as $video) {
            $lesson->videos()->create($video);
        }
        return redirect()->route('lessons.index')->with('success','添加课程成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
