<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Mail\SignupMail;
use App\Notifications\WelcomemailNotification;

use Hash;
use Mail;
use Auth;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signup.create');
    }
    public function dashbord()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SignupRequest $request)
    {
        $input  = $request->all();
        $input['password']=Hash::make($input['password']);
        try{
          $user= User::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('signup.create')->with('error', $e->getMessage());
        }
        $user->notify(new WelcomemailNotification());
        return redirect()->route('login.index')->with('success', 'Signup Successfully');
    }
    public function login(LoginRequest $request)
    {
        $input  = $request->only('email','password');
        // $credentials = [
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        // ];

        if(Auth::attempt($input)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Email or Password is incorrect');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
