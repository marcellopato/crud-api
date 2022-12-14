<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['name'];
    protected $table = 'campanhas';
}
