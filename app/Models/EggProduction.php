<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EggProduction extends Model
{
    use HasFactory;

    protected $table = 'eggproduction';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'date',
        'quantity',

    ];
}
