@extends('adminlte::page')

@section('title', 'Update Event')

@section('content_header')
    <h1>Update Event</h1>
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
                    <form role="form" action="{{ route('events.update', ['id' => $event->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Event Name</label>
                                <input type="text" class="form-control"  name="name" id="name" value="{{ $event->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Event Description</label>
                                <textarea class="form-control" rows="2" name="description" required>{{ $event->description }}</textarea>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="active" value="1" {{ $event->active == 1 ? 'checked': '' }}> Active?
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete? </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="modal fade" id="delete" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you Sure .. you want to Delete This Event?</h4>
                        </div>
                        <div class="modal-footer">

                            <form action="{{ route('events.destroy', ['id' => $event->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes Delete this Event</button>
                            </form>

                        </div>
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
