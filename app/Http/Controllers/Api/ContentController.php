<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Tag;
use App\Admin\Lesson;
use App\Admin\Video;

class ContentController extends CommonController
{
    /**
     *  查询所有课程标签
     *   
     *  @param void
     *  @return Illuminate\http\Response;
     */
    public function tags()
    {
        return $this->response(Tag::get());
    }

    /**
     *  根据标签查询所有课程
     *   
     *  @param $tid  标签编号
     *  @return Illuminate\http\Response;
     */
    public function lesson($tid)
    {
        if($tid){
            $data = Tag::find($tid)->lessons()->get();
        }else{
            $data = Lesson::get();
        }
        
        return $this->response($data);
    }

    /**
     *  查询所有课程标签
     *   
     *  @param void
     *  @return Illuminate\http\Response;
     */
    public function commentLesson($row)
    {
        $data = Lesson::where('iscomment',1)->limit($row)->get();
        return $this->response($data);
    }

    public function hotLesson($row)
    {
        $data = Lesson::where('ishot',1)->limit($row)->get();
        return $this->response($data);
    }

    public function videos($lessionId)
    {
        $data = Video::where('lesson_id',$lessionId)->get();
        return $this->response($data);
    }
}

