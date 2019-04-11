@extends('adminlte::page')

@section('title', 'Update Card')

@section('content_header')
    <h1>Update Card</h1>
@stop

@section('content')

    <section class="content">
        <div class="row">

            <div class="col-md-12">

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
                    <form role="form" action="{{ route('cards.update', ['id' => $card->id]) }}" method="post">
                        @csrf
                        @method('PUT')
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
                                <div class="card-edit-thumb" style="
                                    background: url('/{{ $card->url }}');
                                    width: {{ $width }}px;
                                    min-height: {{ $height }}px
                                    ">
                                    <div class="example_text" style="
                                        color: {{ $card->text_color }};
                                        font-size: {{ $card->font_size }}px;
                                        position: relative;
                                        top: {{ $card->positionY }}px;
                                        left: {{ $card->positionX }}px;
                                        width: {{ $width }}px;
                                        height: {{ $height }}px;
                                        text-align: center;
                                        display: inline;
                                    ">
                                        <span id="demoTexthint">{Text will be Here}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Text Settings</h3>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <p>Orginal Dimensions: <b>{{ $width }}px x {{ $height }}px</b></p>
                                </div>
                                <hr>
                                <div class="col-xs-3">
                                    <label>Demo Text</label>
                                    <div class="input-group">
                                        <input type="text" id="demoText" class="form-control" value="{Text will be Here}">
                                        <span class="input-group-btn">
                                              <a class="btn btn-info btn-flat" onclick="updateDemoText()"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <label>Position X</label>
                                    <div class="input-group">
                                        <input type="text" id="positionX" name="positionX" class="form-control" value="{{ $card->positionX }}">
                                        <span class="input-group-addon">px</span>
                                            <span class="input-group-btn">
                                              <a class="btn btn-info btn-flat" onclick="updateX()"><i class="fa fa-refresh"></i></a>
                                            </span>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <label>Position Y</label>
                                    <div class="input-group">
                                        <input type="text" id="positionY" name="positionY" class="form-control" value="{{ $card->positionY }}">
                                        <span class="input-group-addon">px</span>
                                        <span class="input-group-btn">
                                              <a class="btn btn-info btn-flat" onclick="updateY()"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <label>Text Color Code</label>
                                    <div class="input-group">
                                        <input type="color" id="textColor" class="form-control" name="text_color" value="{{ $card->text_color }}">
                                        <span class="input-group-btn">
                                              <a class="btn btn-info btn-flat" onclick="updateColor()"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <label>Font</label>
                                    <input type="hidden" id="font_id" name="font_id" value="{{ $card->font_id }}">
                                    <select name="font_name" id="font_name" class="form-control" onchange="updateFont()">
                                        <option value="">Please Choose Font</option>
                                        @foreach($fonts as $font)
                                            <option value="{{ $font->id }}, {{ $font->name }}">{{ $font->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <label>Font Size</label>
                                    <div class="input-group">
                                        <input type="text" id="fontSize" name="font_size" class="form-control" value="{{ $card->font_size }}">
                                        <span class="input-group-addon">px</span>
                                        <span class="input-group-btn">
                                              <a class="btn btn-info btn-flat" onclick="updateSize()"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                                </div>


                            </div>

                            <hr>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="active" value="1" checked> Active?
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
                            <form action="{{ route('events.destroy', ['id' => $card->id]) }}" method="post">
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
    <style>
        @foreach($fonts as $font)
        @font-face {
            font-family: {{ $font->name }};
            src: url('/{{ $font->url }}');
        }
        @endforeach

    </style>
@stop

@section('js')
    <script>
        var text = document.querySelector('.example_text');

        function updateX() {
            var x = document.getElementById("positionX").value;
            text.style.left = x + 'px';
        }

        function updateY() {
            var y = document.getElementById("positionY").value;
            text.style.top = y + 'px';
        }
        
        function updateColor() {
            var textColorInput = document.getElementById("textColor").value;
            var font_id = document.getElementById("font_id").value;

            text.style.color = textColorInput;
        }

        function updateFont() {
            var font_name = document.getElementById("font_name").value;
            var newtext = font_name.trim().split(", ");

            document.getElementById("font_id").value = newtext[0];
            text.style.fontFamily = newtext[1];



        }

        function updateSize() {
            var fontSize = document.getElementById("fontSize").value;
            text.style.fontSize = fontSize + 'px';
        }
        function updateDemoText() {
            var demoText = document.getElementById("demoText").value;
            document.getElementById("demoTexthint").innerHTML = demoText;

        }


    </script>
@stop
