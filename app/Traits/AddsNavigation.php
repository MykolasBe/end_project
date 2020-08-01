<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

trait AddsNavigation{

    public function addNavigation()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            $dropdown_links = [];
            if (!$user) {
                $right_links[]= ['url'=> route('jobs.index'), 'display' => 'Job Listings'];
                $right_links[]= ['url'=> route('application.create'), 'display' => 'Send Application'];
                $right_links[]= ['url'=> route('login'), 'display' => 'Login'];
            } else {
                $right_links[]=['url'=> route('jobs.index'), 'display' => 'Job Listings'];
                $right_links[]=['url'=> route('jobs.create'), 'display' => 'Add Job'];
                $right_links[]=['url'=> route('jobs.applied'), 'display' => 'Applied for'];
                $right_links[]=['url'=> route('application.index'), 'display' => 'Applications'];

                $dropdown_links = [
                    ['url'=> route('logout'), 'display' => 'Logout'],
                ];
            }

            View::share('nav',['links'=>[
                'left' => [
//                    ['url'=> route('home'), 'display' => 'Home'],
                ],
                'right' => $right_links,
                'dropdown' => $dropdown_links,
            ]]);

            return $next($request);
        });
    }
}
