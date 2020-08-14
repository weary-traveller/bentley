@extends('layouts.app')

@section('title', 'File Upload')

@section('content')
<nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand navbar-bold" href="{{ route('upload') }}">
                    Import Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <!-- <form action="{{ route('downloaddata') }}" class="form-horizontal" method="post" id="form_id">
                    <a class="navbar-brand" href="javascript:$('#form_id').submit();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    {{ csrf_field() }}
                </form> -->
                <a class="navbar-brand" href="{{ route('downloaddatadisplay') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>

                    <a class="navbar-brand" href="{{ route('displaydata') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Display Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                    <a class="navbar-brand" href="{{ route('displayadddata') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insert Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>

                <a class="navbar-brand" href="{{ route('dataservice') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
        </nav>
        <br>
        <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form style="border: 4px solid #a1a1a1;margin-top: 15px;margin-left: 350px;padding: 10px;margin-right: 240px;" action="{{ URL::to('upload/uploaddata') }}" class="form-horizontal" method="post" enctype="multipart/form-data" files=true >
                    {{ csrf_field() }}
                    <input type="file" name="import_file" />
                    <button class="btn btn-primary">Import File</button>
                    </form>
                </div>
                <br>
                @error('import_file')
                    <div style="margin-left: 350px;margin-right: 240px;" class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
@endsection