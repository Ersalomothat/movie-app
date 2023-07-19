<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\user\UserService;
use App\Services\user\UserServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserServiceInterface $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signIn(Request $request)
    {
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            '*.required' => ':attribute required'
        ]);

        $logged = $this->userService->logIn($user['email'], $user['password']);
        if ($logged) {
            return redirect()->route('home')->with('success', 'logged');
        }
        return redirect()->back()->with('error', 'Credential is wrong');

    }


    public function signUp(UserRequest $request)
    {
        $data = $request->all();
        $user = $this->userService->create($request->all());
        $logged = $this->userService->logIn($user['email'], $data['password']);

        if ($logged) return redirect()
            ->route('home')->with('success', 'registered');

        return redirect()
            ->back()->with('error', 'Credential is wrong');

    }

    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->flush();
        return to_route('home');
    }
}
