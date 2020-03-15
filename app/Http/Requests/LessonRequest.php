<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'title' => 'required',
                    'introduce' => 'required',
                    'preview' => 'required',
                    'ishot' => 'required|numeric',
                    'click' => 'required|numeric',
                    //'iscommend' => 'required',
                ];
            }
            // UPDATE
            case 'PUT':
            {
                return [
                    'title' => 'required',
                    'introduce' => 'required',
                    //'preview' => 'required',
                    'ishot' => 'numeric',
                    'click' => 'numeric',
                    //'iscommend' => 'numeric',
                ];
            }
            case 'PATCH':
            {
                return [
                    'title' => 'required',
                    'introduce' => 'required',
                    //'preview' => 'required',
                    'ishot' => 'numeric',
                    'click' => 'numeric',
                    //'iscommend' => 'numeric',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    /**
     *  回传验证错误信息
     *  @param [type] $[name] [<description>]
     *  
     */
    public function messages()
    {
        return [
            'title.required' => '课程名称不能为空',
            'introduce.required' => '课程简介不能为空',
            'preview.required' => '简介不能为空',
            'ishot.required' => '热门课程不能为空',
            'ishot.numeric' => '是否热门课程应为数字0或1',
            'click.required' => '点击数量不能为空',
            'click.numeric' => '点击数量应为数字',
            //'iscommend.numeric' => '是否推荐不能为空',
        ];
    }
}
