<?php
namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function allUser()
    {
        return User::all();

    }

    public function showUser($id)
    {
        $user=User::findOrFail($id);
        return $user;

    }
}
