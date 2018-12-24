<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract{
    public function transform(User $user){
        return [
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'token' => $user->token,
        ];
    }
}