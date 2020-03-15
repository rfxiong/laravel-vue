<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MydbRequest extends FormRequest
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
                if(empty($this->amount)){   //amount为空则不检测
                    return [
                    'goods_name' => 'required|between:2,50',
                ];
                }else{
                    return [
                        'goods_name' => 'required|between:2,50',
                        'amount' => 'numeric'
                    ];
                }
            }
            // UPDATE
            case 'PUT':
            {
                return [
                        'goods_name' => 'required|between:2,50',
                        'amount' => 'numeric'
                    ];
            }
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
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
            'goods_name.required' => '商品名称不能为空',
            'goods_name.between' => '商品名称长度在2-50之间',
            //'amount.required' => '商品数量不能为空',
            'amount.numeric' => '商品数量应为数字',
        ];
    }
}
