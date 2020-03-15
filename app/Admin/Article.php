<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Article
 *
 * @property int $id
 * @property string $title 标题|input
 * @property string $author 作者|input
 * @property string $content 内容|simditor
 * @property string $thump 缩略图|image
 * @property int $click 查看次数|input
 * @property int $iscommend 推荐|radio|1:是,2:否
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereIscommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereThump($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $fillable = ['title','author','content','thump','click','iscommend'];
}
