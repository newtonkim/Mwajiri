@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row d-flex w-100 py-4">
            <div class="card mx-auto">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('countries.index') }}" method="GET">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                            placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('countries.create') }}" class="btn btn-primary">Create</a>

                    </div>
                    <div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Country Code</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <th scope="row">{{ $country->id }}</th>
                                    <td>{{ $country->country_code }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>
                                        <a href="{{ route('countries.edit', $country->id) }}"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
