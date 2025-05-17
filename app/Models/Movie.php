<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
  
    use HasFactory;

    // Tắt tính năng timestamps  
    public $timestamps = false;  

  
    public function category(){
          return $this->belongsTo(Category::class,'category_id','id');
    }
     public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
     public function genre(){
        return $this->belongsTo(Genre::class,'genre_id');
    }
    public function movie_genre(){
      return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }
    public function episode(){
      return $this->hasMany(Episode::class);
    }
    protected $table = 'movies'; // Định danh bảng movies
    protected $fillable = [
        'title',
        'count_views',
        'category_id',
        'genre_id',
        'country_id',
        'status'
    ];

}


