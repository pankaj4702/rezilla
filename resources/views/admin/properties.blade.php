@extends('admin.main.main')
@section('content-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Properties</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Properties</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Properties </h3>
                        </div>
                    </div>

                    <table class="table" id="mytable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sno.</th>
                                <th scope="col"> Property Type</th>
                                <th scope="col"> Property Name</th>
                                <th scope="col">Property Status</th>
                                <th scope="col">Property Source</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $property)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $property->type }}</td>
                                <td>{{ $property->porperty_name }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->source }}</td>
                                <td>
                                    @php
                                    $encryptedId = encrypt($property->id);
                                    @endphp
                                    <a href="{{route('project_detail',['id' => $encryptedId])}}"><button>detail</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </section>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
@endsection

<
