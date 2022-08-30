<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;

class Grupo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['name'];

    /**
     * Get the Cidades associated with the Grupo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cidade()
    {
        return $this->hasMany(Cidade::class);
    }
}
