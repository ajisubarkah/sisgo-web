<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract{
    public function transform(User $user){
        return [
            'username' => $user->username,
            'registered' => $user->create_at->diffForHuman(),    
        ];
    }
}