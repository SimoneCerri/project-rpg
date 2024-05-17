@extends('layout.app')
@section('page-title')
    Characters
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attack</th>
                    <th scope="col">Defense</th>
                    <th scope="col">Speed</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($characters as $character)
                    <tr class="">
                        <td scope="row">{{ $character->id }}</td>
                        <td scope="row">{{ $character->name }}</td>
                        <td scope="row">{{ $character->description }}</td>
                        <td scope="row">{{ $character->attack }}</td>
                        <td scope="row">{{ $character->defense }}</td>
                        <td scope="row">{{ $character->speed }}</td>
                        <td scope="row">View/Edit/Delete</td>

                    </tr>
                @empty
                    <span>Nothing to show...</span>
                @endforelse
            </tbody>

        </table>
    </div>
@endsection
