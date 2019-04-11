@extends('adminlte::page')

@section('title', 'Add new Font')

@section('content_header')
    <h1>Add new Font</h1>
@stop

@section('content')

    @if(Session::has('message'))
        <div class="col-md-12">
            <div class="alert alert-{{ Session::get('class') }}" role="alert" id="CustomAlert">
                <span>{{ Session::get('message') }}</span>
            </div>
        </div>
    @endif


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
                    <form role="form" action="{{ route('fonts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Font Name</label>
                                <input type="text" class="form-control"  name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="url">Font File</label>
                                <input type="file" class="form-control"  name="url" id="url" required>
                                <small class="red">Only ttf is allowed</small>
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
