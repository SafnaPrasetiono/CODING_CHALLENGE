<?php

namespace App\Http\Controllers;

use App\Models\pembayaran_bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    // show home pages
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

}
