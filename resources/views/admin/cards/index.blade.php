@extends('adminlte::page')

@section('title', 'Cards')

@section('content_header')
    <h1>Cards</h1>
@stop

@section('content')
    
    <div class="add-button">
        <a href="{{ route('cards.create') }}" class="btn btn-success">Add new Card</a>
    </div>
    <br>
    @if(Session::has('message'))
        <div class="col-md-12">
            <div class="alert alert-{{ Session::get('class') }}" role="alert" id="CustomAlert">
                <span>{{ Session::get('message') }}</span>
            </div>
        </div>
    @endif

    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cards Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Card</th>
                                    <th>Event</th>
                                    <th>Status</th>
                                    <th>Text Position</th>
                                    <th>Edit</th>
                                </tr>
                                @if($cards->count() == 0)
                                    <tr>
                                        <td colspan="6"><p class="alert alert-danger">there is no Cards Yet</p></td>
                                    </tr>
                                @else
                                    @foreach($cards as $card)
                                        <tr>
                                            <td>{{ $card->id }}</td>
                                            <td class="card-thumb">
                                                <img src="/{{ $card->url }}" alt="">
                                            </td>
                                            <td>
                                                {{ $card->event->name }}
                                            </td>
                                            <td>
                                            <span class="badge bg-{{ $card->active == true ? 'green': 'red' }}">
                                                {{ $card->active == true ? 'active': 'inactive' }}
                                            </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $card->positionX == '' ? 'red':'green' }}">
                                                    {{ $card->positionX == '' ? 'Need to Position Text':'Positioned Successfully' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('cards.edit', ['id' => $card->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $cards->links() }}
                    </div>
                </div>

            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->

    </section>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/style.css">
@stop
