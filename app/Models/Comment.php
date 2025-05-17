<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Comment extends Model  
{  
    public $timestamps = false;
    protected $fillable = [
        'comment', 'comment_name', 'comment_date','comment_movie_id'
        ];
        protected $primaryKey = 'comment_id';
        protected $table = 'comments';

        public function movie()
        {
            return $this->belongsTo(Movie::class, 'comment_movie_id','id');
        }
} 