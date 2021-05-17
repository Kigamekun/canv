<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_client extends Model
{
    protected $table = 'view_client';
    protected $fillable = ['user_id','resource_id','code'];
    use HasFactory;
}
