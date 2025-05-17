<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateCommentsTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('comments', function (Blueprint $table) {  
            $table->id(); // Tạo cột ID (khóa chính)  
            $table->unsignedBigInteger('movie_id'); // Khóa ngoại liên kết với bảng movies  
            $table->string('author'); // Cột tên tác giả bình luận  
            $table->text('content'); // Cột nội dung bình luận  
            $table->timestamps(); // Tạo cột created_at và updated_at  
            
            // Định nghĩa khóa ngoại  
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('comments'); // Xóa bảng khi rollback migration  
    }  
}  
