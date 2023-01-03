<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Str;

use Validator;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function index()
    {
        return view('auth.register');
    }

    protected function create(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            // 'captcha' => 'required|captcha',
            'name' => ['required', 'string', 'max:25'],
            'email' => 'required|string|email|max:255|unique:users,email',
            'users.password' => ['confirmed', 'string', 'min:8', 'confirmed'],
        ], [
            'captcha' => 'Captha incorrect'
        ]);

        if ($validator->passes()) {

            $data = [
                'uuid' => Str::uuid()->getHex(),
                'name' => $request['name'],
                'email' => $request['email'],
                'status' => 1,
                'role' => 'peserta',
                'password' => bcrypt($request['password']),
            ];
            $user = User::create($data);

            $user->assignRole('peserta');

            Profile::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'uuid' => Str::uuid()->getHex(),
            ]);

            return redirect()->route('login')
                ->withSuccess('User was successfully created.');
        }
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
