<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersData extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'date_of_birth',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip_code'

    ];
}
