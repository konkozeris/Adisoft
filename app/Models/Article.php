<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "articles";

    protected $fillable = ["title", "content", "description", "category_id", "date"];

    public $sortable = ["id", "title", "content", "description", "category_id", "date"];

    public function categories() {
        return $this->belongsToMany(Category::class);

    }
    public function articleComment() {
        return $this->hasMany(Comment::class, 'article_id', 'id');

    }
}
