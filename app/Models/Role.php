<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    public  static function getRoleIdByName($roleName)
    {
        $roleId = Role::where('name', $roleName)->pluck('id')->first();
        return $roleId;
    }
}
