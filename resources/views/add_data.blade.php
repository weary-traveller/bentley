@extends('layouts.app')

@section('title', 'Add Data')

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
                <a class="navbar-brand navbar-bold" href="{{ route('displayadddata') }}">
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
                    <form action="{{ URL::to('upload/adddata') }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}

                    <div class="form-group add-custom-location">
                    <!-- <div style="margin-left: 350px;margin-right: 240px;" class="form-group"> -->
                        <label class="col-sm-3 control-label" for="data_id">Data ID</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="data_id" name="data_id" value="{{ old('data_id') }}"><br>
                            @error('data_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="building_name">Building Name</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ old('building_name') }}" type="text" id="building_name" name="building_name"><br>
                            @error('building_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="floor_number">Floor Number</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ old('floor_number') }}" type="text" id="floor_number" name="floor_number"><br>
                            @error('floor_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="room_number">Room Number</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ old('room_number') }}" type="text" id="room_number" name="room_number"><br>
                            @error('room_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="capacity">Capacity</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ old('capacity') }}" type="text" id="capacity" name="capacity"><br>
                            @error('capacity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3 form-group add-custom-location">
                        <button class="btn btn-primary">Add Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
