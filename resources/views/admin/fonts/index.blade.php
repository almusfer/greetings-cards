@extends('adminlte::page')

@section('title', 'Fonts')

@section('content_header')
    <h1>Fonts</h1>
@stop

@section('content')
    
    <div class="add-button">
        <a href="{{ route('fonts.create') }}" class="btn btn-success">Add new Font</a>
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
                        <h3 class="box-title">Fonts Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                </tr>
                                @if($fonts->count() == 0)
                                    <tr>
                                        <td colspan="6"><p class="alert alert-danger">there is no Fonts Yet</p></td>
                                    </tr>
                                @else
                                    @foreach($fonts as $font)
                                        <tr>
                                            <td>{{ $font->id }}</td>
                                            <td>{{ $font->name }}</td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $fonts->links() }}
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
