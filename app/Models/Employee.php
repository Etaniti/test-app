<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'organization_id',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'inn',
        'snils'
    ];

    public function organization()
    {
        return $this->belongsToMany(Organization::class);
    }
}
