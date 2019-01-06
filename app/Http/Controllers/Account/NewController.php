<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class NewController extends Controller
{
    public function index() {
        return view('pages.account.new');
    }
}
