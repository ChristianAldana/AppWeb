<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name']; // Permitir asignación masiva para el campo 'name'

    // Relación con el modelo User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
