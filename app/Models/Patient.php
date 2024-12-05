<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'room', 'gender', 'disease', 'doctor', 'status', 'age'
    ];

    // Jika Anda memiliki timestamp (created_at dan updated_at), pastikan Anda sudah mengaturnya
    public $timestamps = true;
}
