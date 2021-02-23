<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class ProjectModel extends Eloquent
{
    protected $connection = 'mongodb';
    
    protected $collection = 'student';
    
    protected $fillable = [
        'first_name', 'last_name','address','location','phone_number'
    ];
}
