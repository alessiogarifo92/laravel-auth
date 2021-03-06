<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function updateUserPic(Request $request)
    {
      $request-> validate([
        'profPic' => 'required|file'
      ]);
      // dd($request);
      $this -> deleteUserPic();

      $image =$request -> file('profPic');
      // dd($image);

      $ext = $image -> getClientOriginalExtension();

      $name = rand(100000,999999) . '_' . time();

      $destFile = $name . '.' . $ext;

      // dd($image, $ext, $name, $destFile);

      $file = $image -> storeAs('profPic',$destFile,'public');

      $user = Auth::user();
      // dd($user);
      $user -> profPic = $destFile;
      $user -> save();

      return redirect() -> back();

    }

    public function clearUserPic()
    {
      $this -> deleteUserPic();

      $user = Auth::user();
      $user -> profPic = null;
      $user -> save();

      return redirect() -> back();
    }

    public function deleteUserPic()
    {
      $user = Auth::user();

      try {
        $fileName = $user -> profPic;
        $file = 'public/profPic/' . $fileName;
        // dd($file);
        //dd($user, $fileName, $file);

        Storage::delete($file);
        // File::delete($file); se uso file sostituire use riga 7

      } catch (\Exception $e) {}

    }
}
