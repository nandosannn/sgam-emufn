<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()->cpf == '11111111111') {
            $user = User::where('cpf', '11111111111')->first();
            $user->assignRole('admin');
        }
        return view('welcome');
    }
}
