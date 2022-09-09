<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:4',
        ]);
        
        $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => '2',
                'status' => '1',
        ]);
        //dd($user);



        $token = $user->createToken('auth_token')->plainTextToken;

            /*return response()->json([
                      'access_token' => $token,
                           'token_type' => 'Bearer',
            ]);*/

            //return view('customerlogin',['token'=>$token]);
            return redirect('customerlogin')->with('token', $token);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {

            /*$return = response()->json([
            'message' => 'Invalid login details'
                   ], 401);*/

            $return='Invalid login details';

            return redirect('customerlogin')->with('return', $return); 
        }

        $user = User::where([ ['email', $request['email']],['role','2'],['status','1'] ])->firstOrFail();

        //dd($user->name);

        $token = $user->createToken('auth_token')->plainTextToken;

        Session::put('CustomerName', $user->name);
        Session::put('CustomerEmail', $user->email);
        Session::put('CustomerID', $user->id);
        Session::put('CustomerToken', $token);

        $return = response()->json([
                   'access_token' => $token,
                   'token_type' => 'Bearer',
        ]);

        return redirect('customerDashboard')->with('return', $return); 
    }


}
