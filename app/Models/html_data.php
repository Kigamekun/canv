<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class html_data extends Model
{
    protected $table = "html_data";
    protected $fillable = ['resource_id','source_code'];
    use HasFactory;
}

