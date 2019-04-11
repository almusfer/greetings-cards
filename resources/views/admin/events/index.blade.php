@extends('adminlte::page')

@section('title', 'Events')

@section('content_header')
    <h1>Events</h1>
@stop

@section('content')
    
    <div class="add-button">
        <a href="{{ route('events.create') }}" class="btn btn-success">Add new Event</a>
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
                        <h3 class="box-title">Events Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Event's Cards Count</th>
                                    <th>Edit</th>
                                </tr>
                                @if($events->count() == 0)
                                    <tr>
                                        <td colspan="6"><p class="alert alert-danger">there is no Events Yet</p></td>
                                    </tr>
                                @else
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->description }}</td>
                                            <td>
                                            <span class="badge bg-{{ $event->active == true ? 'green': 'red' }}">
                                                {{ $event->active == true ? 'active': 'inactive' }}
                                            </span>
                                            </td>
                                            <td>{{ $event->cards->count() }}</td>
                                            <td>
                                                <a href="{{ route('events.edit', ['id' => $event->id]) }}">
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
                        {{ $events->links() }}
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
