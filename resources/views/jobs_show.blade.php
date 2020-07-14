@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$job->title}}</h2>
        <div>
            <div>
                @foreach(json_decode($job->description) as $key => $description)
                    @switch($key)
                        @case('description')
                        <h3>Description:</h3>
                        @break
                        @case('requirements')
                        <h3>Requirements:</h3>
                        @break
                        @case('advantages')
                        <h3>Advantages:</h3>
                        @break
                        @case('offer')
                        <h3>Offer:</h3>
                        @break
                    @endswitch
                    @include('components.list',['list'=>$description])
                @endforeach
            </div>
            <div>
                <div>
                    <img src="{!! $job->img !!}">
                </div>
                <p>{{ $job->client_description }}</p>
            </div>
        </div>
        <div>
            {!! $buttons !!}
        </div>
        <p>CV  su nuoroda “{{$job->title}}” siųskite el.paštu: personalas@expertus.lt</p>
        <p>Konfidencialumą garantuojame. Informuosime tik tinkamus kandidatus.</p>
        <p>Pateikdami savo gyvenimo aprašymą įmonei UAB Expertus LT, Jūs sutinkate,
            jog naudosime Jūsų asmens duomenis personalo atrankos tikslais.
            Daugiau informacijos <a href="">rasite cia</a></p>
    </div>
@endsection
