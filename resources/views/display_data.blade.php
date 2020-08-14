@extends('layouts.app')
@section('title', 'Display Data')

@section('content')
<nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('upload') }}">
                    Import Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <a class="navbar-brand" href="{{ route('downloaddatadisplay') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                
                <a class="navbar-brand navbar-bold" href="{{ route('displaydata') }}">
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
                <div>
                </div>
                <div class="panel-body data-table-location">
                    @if ($excel_data_combined->isEmpty())
                        <p>You have not created any tickets.</p>
                    @else
                    <div>
                        <table class="table" id="data-table">
                            <thead>
                                <tr>
                                    <th>Data ID</th>
                                    <th>Building Name</th>
                                    <th>Floor Number</th>
                                    <th>Room Number</th>
                                    <th>Capacity</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($excel_data_combined as $excel_data)
                                <tr>
                                    <td>
                                        {{ $excel_data->data_id }}
                                    </td>
                                    <td>
                                        {{ $excel_data->building_name }}
                                    </td>
                                    <td>
                                        {{ $excel_data->floor_number }}
                                    </td>
                                    <td>
                                        {{ $excel_data->room_number }}
                                    </td>
                                    <td>
                                        {{ $excel_data->capacity }}
                                    </td>
                                    <td>
                                    <a href="{{ URL::to('upload/displayupdatedata/'. $excel_data->id) }}" class="btn btn-info">Update</a>
                                    </td>
                                    <td>
                                        <form action="{{ URL::to('upload/deletedata') }}" method="post">
                                    <button class="btn  btn-danger" value="{{ $excel_data->id }}" name="cancel" type="submit" >Delete</button>
                                    {{ csrf_field() }}
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection