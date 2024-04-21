<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class WelcomeController extends Controller
{
    //
    public function render()
    {
        $currentYear = Carbon::now()->year;
        return view('welcome', compact('currentYear'));
    }
}
