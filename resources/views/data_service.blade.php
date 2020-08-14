@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
<nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('upload') }}">
                    Import Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <a class="navbar-brand" href="{{ route('downloaddatadisplay') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <a class="navbar-brand" href="{{ route('displaydata') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Display Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <a class="navbar-brand" href="{{ route('displayadddata') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insert Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>

                <a class="navbar-brand navbar-bold" href="{{ route('dataservice') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
        </nav>
        <br>
        <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body add-custom-location">
                    <form action="{{ URL::to('dataservicereturn') }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="data_id">Data_id</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="data_id" name="data_id"><br>
                            @error('data_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="output_type">Output Type</label><br>
                        <div class="col-sm-6">
                            <select name="output_type" id="output_type">
                                <option value="XML">XML</option>
                                <option value="HTML">HTML</option>
                                <option value="JSON">JSON</option>
                            </select>
                            @error('output_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3 form-group">
                        <button class="btn btn-primary">Search</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection