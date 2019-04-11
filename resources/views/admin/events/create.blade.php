@extends('adminlte::page')

@section('title', 'Add new Event')

@section('content_header')
    <h1>Add new Event</h1>
@stop

@section('content')

    <section class="content">
        <div class="row">

            <div class="col-md-6">

                <div class="box box-primary">
                    @if ($errors->any())
                        <div class="custom-alert alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Event Name</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Ramadan Kareem" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Event Description</label>
                                <textarea class="form-control" rows="2" name="description" placeholder="Event Description" required></textarea>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="active" value="1" checked> Active?
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
