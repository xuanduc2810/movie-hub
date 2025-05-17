<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }
    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();// Mạng xã hội là gg

       

            $finduser = User::where('google_id', $user->google_id)->first();// tìm kiếm xem tài khoản đã có trong db chưa

       

            if($finduser){ // nếu có

       

                Auth::login($finduser); //login ngay lập tức

      

                return redirect()->intended('/');

       

            }else{ // nếu k có

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456789') // trên 8 ký tự

                ]);

      
                //login vào với acc mới
                Auth::login($newUser);

      

                return redirect()->intended('/');

            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
    public function logout_Home() {
        Auth::logout();
        return redirect()->back();
    }

}

