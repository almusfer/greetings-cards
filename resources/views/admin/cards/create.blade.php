@extends('adminlte::page')

@section('title', 'Add new Card')

@section('content_header')
    <h1>Add new Card</h1>
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
                    <form role="form" action="{{ route('cards.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="event">Event</label>
                                <select name="event_id" id="event" class="form-control" required>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="card">Card</label>
                                <input type="file"  id="card" class="form-control" name="url" required>
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
