<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motels extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'area',
        'count_view',
        'address',
        'latlng',
        'images',
        'user_id',
        'category_id',
        'district_id',
        'utilities',
        'phone',
        'approve',
     ];
}
