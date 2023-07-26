@extends('front.layouts.layout')

@section('content')

    <section class="main_section">
        <div class="container">
            <div class="main_text">
                <div class="header_text">
                    <h1 class="h1_light">

                       {{$contact->title}}
                    </h1>
                    <div class=>
                      <p>{!! $contact->description !!}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
