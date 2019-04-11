@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="col-md-8 float-left">
                            <div class="card-preview">
                                <img src="/{{ $card->url }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-4 float-left">
                            <form action="{{ route('generate.step') }}" method="post">
                                @csrf
                                <input type="hidden" name="card_id" value="{{ $card->id }}">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <div>
                                        <input type="text" name="user_name" class="form-control customInput" placeholder="عبدالكريم المسفر" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="customBtn">Generate</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
