<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $category = $this->route('category');
        $id = $category? $category->id:null;
        return [
            'name' => 'required|unique:categories,name,'.$id,
            'parent' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '栏目名称不能为空',
            'name.unique' => '栏目名称已存在',
            'name.required' => '父级栏目不能为空',
        ];
    }
}
