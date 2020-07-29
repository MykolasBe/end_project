@extends('layouts.app')

@section('content')
    <div class="container">

        <section>
            <div>
                <h1>Recruitment</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur.</p>
                <p>We specialize in:</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>eiusmod tempor incididunt</li>
                </ul>
            </div>
            <div>
                <h2>Why us</h2>
                <div>
                    <ul>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    <ul>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="card-section">
            <div class="card-wrap">
                <div class="card">
                    <a href="{{route('recruit')}}">
                        <div class="square-1"></div>
                        <div class="square-2"></div>
                        <div class="card-info">
                            <div class="card-img"><img src="https://www.expertus.lt/wp-content/uploads/2016/02/atranka.png"></div>
                            <h2>Employee recruitment</h2>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="{{route('lease')}}">
                        <div class="square-1"></div>
                        <div class="square-2"></div>
                        <div class="card-info">
                            <div class="card-img"><img src="https://www.expertus.lt/wp-content/uploads/2016/02/nuoma.png"></div>
                            <h2>Employee leasing</h2>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="{{route('consult')}}">
                        <div class="square-1"></div>
                        <div class="square-2"></div>
                        <div class="card-info">
                            <div class="card-img"><img src="https://www.expertus.lt/wp-content/uploads/2016/02/konsultacijos.png"></div>
                            <h2>Consultations</h2>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <h2>Looking for a employment? Browse our job offers</h2>
            <div>{!! view('partials.link',['href'=>route('jobs.index'),'text'=>'Browse Jobs']) !!}</div>
        </section>
    </div>
@endsection
