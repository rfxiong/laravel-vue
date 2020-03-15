<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Category
 *
 * @property int $id
 * @property string $name
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','parent'];

    public function getTree($categories)
    {
        $tree = [];
        foreach ($categories as $value) {
            if($value->parent == 0){
                $tree[] = $value;
                foreach ($categories as $v) {
                    if($value->id === $v->parent){
                        $v->name = '|----'.$v->name;
                        $tree[] = $v;
                    }
                }
            }
        }
        return $tree;
    }
    
    public function tree()
    {
        $categories = Category::get();
        return $this->getTree($categories);
    }
}
