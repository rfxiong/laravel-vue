<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $permission = $this->route('permission');
        $id = $permission? $permission->id:null;
        return [
            'title' => 'required|unique:permissions,title,'.$id,
            'name' => 'required|unique:permissions,name,'.$id,
            'url' => 'required',
            'guard_name' => 'required',
            'pid' => 'required',
        ];
        
    }

    public function messages()
    {
        return [
            'title.required' => '角色描述不能为空',
            'title.unique' => '角色描述已存在',
            'name.required' => '角色名称不能为空',
            'name.unique' => '角色名称已存在',
        ];
    }
}
