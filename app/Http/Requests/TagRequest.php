<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        //先获取当前$id,在编辑输入信息验证时，唯一性验证时排除自己
        $tag = $this->route('tag');
        $id = $tag? $tag->id:null;
        return [
            'name' => 'required|unique:tags,name,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签名称不能为空',
            'name.unique' => '标签名称已存在',
        ];
    }
}
