@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="col-md-9 float-left">

                            <div class="card-preview">
                                <img src="/{{ $card->card_url }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 float-left">
                            <a href="/{{ $card->card_url }}" class="customBtn" download><i class="fas fa-download"></i> Download</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
