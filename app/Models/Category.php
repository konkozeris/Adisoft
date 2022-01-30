<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "categories";

    protected $fillable = ["title"];

    public $sortable = ["id", "title"];

    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
