<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedUrl extends Model
{
    use HasFactory;
    protected $fillable = ['original_url', 'random_slug', 'custom_slug', 'full_url', 'user_ip', 'user_agent'];
}
