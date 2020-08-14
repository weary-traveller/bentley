@extends('layouts.app')

@section('title', 'Data Service Display')

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
                <div class="panel-body">
                    @if ($output_data->isEmpty())
                        <p>No Data</p>
                    @else
                    <div>
                        <table class="table" id="data-stream">
                            <thead>
                                <tr>
                                    <th>Data ID</th>
                                    <th>Building Name</th>
                                    <th>Floor Number</th>
                                    <th>Room Number</th>
                                    <th>Capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($output_data as $output)
                                <tr>
                                    <td>
                                        {{ $output->data_id }}
                                    </td>
                                    <td>
                                        {{ $output->building_name }}
                                    </td>
                                    <td>
                                        {{ $output->floor_number }}
                                    </td>
                                    <td>
                                        {{ $output->room_number }}
                                    </td>
                                    <td>
                                        {{ $output->capacity }}
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