<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' =>'Register '
        ]); 
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'password' => 'required' 
        ]);

        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData); 

        return redirect('/login');
    }
}
