<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Campos que permiten asignación masiva
    protected $fillable = ['user_id', 'status', 'process_name', 'process_date', 'user_id', 'customer_id'];

    // Relación con User (un Order pertenece a un User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}