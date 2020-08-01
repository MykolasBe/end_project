<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application home.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application home-recruit.
     */
    public function recruit()
    {
        return view('recruit');
    }

    /**
     * Show the application home-lease.
     */
    public function lease()
    {
        return view('lease');
    }

    /**
     * Show the application home-consult.
     */
    public function consult()
    {
        return view('consult');
    }
}
