@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">States</h1>
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
                            <form action="{{ route('states.index') }}" method="GET">
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
                        <a href="{{ route('states.create') }}" class="btn btn-primary">Create</a>

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
                                <th scope="col">State Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                                <tr>
                                    <th scope="row">{{ $state->id }}</th>
                                    <td>{{ $state->country->country_code }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td>
                                        <a href="{{ route('states.edit', $state->id) }}"
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
