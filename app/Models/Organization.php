<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'ogrn',
        'oktmo'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
