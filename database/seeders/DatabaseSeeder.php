<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use App\Models\Movie; // Đảm bảo bạn đã import model Movie
use App\Models\Statistic;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        
        // DB::table('statistics')->insert([
        //     [
        //         'device_name' => 'Laptop',
        //         'computer_name' => 'DESKTOP-1234',
        //         'website' => 'example.com',
        //         'operating_system' => 'Windows 10',
        //         'ip_address' => '192.168.1.1',
        //         'visit_count' => 5,
        //         'updated_at' => Carbon::now(),
                
        //     ],
        //     [
        //         'device_name' => 'Mobile',
        //         'computer_name' => 'iPhone-14',
        //         'website' => 'example.net',
        //         'operating_system' => 'iOS 17',
        //         'ip_address' => '192.168.1.2',
        //         'visit_count' => 10,
        //         'updated_at' => Carbon::now(),
                
        //     ]
        // ]);

        Statistic::create([
            'category_new' => 1,   // Số danh mục mới
            'genre_new' => 0,      // Số thể loại mới
            'country_new' => 0,    // Số quốc gia mới
            'movie_new' => 0,      // Số phim mới
            'comment_new' => 1,    // Số bình luận mới
            'date' => Carbon::now()->toDateString(), // Đúng tên cột trong database
        ]);
    }
}
  