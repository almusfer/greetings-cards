@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <p>Kindly Choose one:</p>
                        @foreach($event->cards as $card)
                            <div class="col-md-6 float-left">
                                <div class="card-preview">
                                    <a href="{{ route('card.step', ['id' => $card->id]) }}">
                                        <img src="/{{ $card->url }}" alt="">
                                    </a>

                                </div>

                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
