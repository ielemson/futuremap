<?php

// Event model (Event.php)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image_banner', 'content', 'gallery','slug','status','location','meta_title','meta_keywords','meta_description'
    ];
   
    protected $casts = [
        'gallery' => 'array',
    ];
}
