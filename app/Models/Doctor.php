<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'specialist',
        'photo',
        'price',
    ];
}
