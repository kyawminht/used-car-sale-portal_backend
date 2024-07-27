<?php
namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function allUser()
    {
        return User::all();
        
    }
}
