<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'user_id',
    ];

    // Định nghĩa mối quan hệ với bảng Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
