<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EggSales extends Model
{
    use HasFactory;

    protected $table = 'eggsales';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'quantity',
        'revenue',
        'date',
    ];
}
