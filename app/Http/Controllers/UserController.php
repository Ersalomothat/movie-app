<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile(Request $request)
    {
        return view('home.user.profile', [
            'title' => 'Profile'
        ]);
    }

    public function balance(Request $request)
    {
        return view('home.user.balance', [
            'title' => 'Balance'
        ]);
    }

    public function history(Request $request)
    {
        return view('home.user.history', [
            'title' => 'History'
        ]);
    }

    public function bookingMovie(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_Date' => 'required',
        ]);
        $current_url = $request->input('current_url');
        $movie = json_decode($request->input('movie'), true);
        $age = get_age($data['birth_Date']);
        if ($age < $movie['age_rating']) {
            return redirect()->to($current_url)->with('info','Your age does\'nt fit to this film');
        }
        dd('wow');
    }
}
