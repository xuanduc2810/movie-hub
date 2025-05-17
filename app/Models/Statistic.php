<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
           'category_new',
        'genre_new',
        'country_new',
        'movie_new',
        'comment_new',
        'date',
        
    ];
    public $timestamps = true; 
   
}
// Statistic::create([
//     'device_name' => 'Laptop Dell',
//     'computer_name' => 'Window',
//     'website' => 'google.com',
//     'operating_system' => 'Window 11',
//     'ip_address' => '127.0.0.1',
//     'visit_count' => 1,
//     'view_count' => 5,
//     'comment_count' => 0,
//     'created_at' => now(),
//     'updated_at' => now()
// ]);

