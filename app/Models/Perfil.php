<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends Model
{
    
    protected $table = 'perfiles';
    
    public function cuentas(): HasMany
    {
        return $this->hasMany(Cuenta::class);
    }

   
}
