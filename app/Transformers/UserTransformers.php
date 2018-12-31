<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract{
    public function transform(User $user){
        return [
            'strUsername' => $user->username,
            'strName' => $user->name,
            'strEmail' => $user->email,
            'strToken' => $user->api_token,
        ];
    }
}
