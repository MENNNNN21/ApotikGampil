<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
