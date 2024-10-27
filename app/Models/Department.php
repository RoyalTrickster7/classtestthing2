<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

// Campos que permiten asignación masiva
protected $fillable = ['name'];

// Relación con User (un Department tiene muchos Users)
public function users()
{
    return $this->hasMany(User::class);
}

}
