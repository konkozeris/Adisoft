<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = ["email", "date", "content", "article_id"];

    public function articleComment() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
