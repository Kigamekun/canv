<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class js_data extends Model
{
    protected $table = 'js_data';
    protected $fillable = ['resource_id','file'];
    use HasFactory;
}
