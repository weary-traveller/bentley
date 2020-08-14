@extends('layouts.app')

@section('title', 'Data Update')

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
                    <form action="{{ URL::to('upload/updatedata') }}" class="form-horizontal" method="post" enctype="multipart/form-data" files=true >
                    {{ csrf_field() }}

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="data_id">Data_id</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="data_id" name="data_id" value="{{ $update_data->data_id }}"><br>
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="building_name">Building Name</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="building_name" name="building_name" value="{{ $update_data->building_name }}"><br>
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="floor_number">Floor Number</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="floor_number" name="floor_number" value="{{ $update_data->floor_number }}"><br>
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="room_number">Room Number</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="room_number" name="room_number" value="{{ $update_data->room_number }}"><br>
                        </div>
                    </div>

                    <div class="form-group add-custom-location">
                        <label class="col-sm-3 control-label" for="capacity">Capacity</label><br>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="capacity" name="capacity" value="{{ $update_data->capacity }}"><br>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ $update_data->id }}">
                    <div class="col-sm-3 form-group add-custom-location">
                        <button class="btn btn-primary">Edit Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection