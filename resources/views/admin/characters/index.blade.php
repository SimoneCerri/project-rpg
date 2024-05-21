@extends('layouts.admin')
@section('page-title')
    Characters
@endsection

@section('content')
    <div class="container p-2">
        <a href="{{ route('characters.create') }}" class="btn btn-primary mb-2">Add a new Character</a>


        @include('partials.session')
        @include('partials.validate')



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
                            <td scope="row">
                                <a href="{{ route('characters.show', $character) }}" class="btn btn-dark"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('characters.edit', $character) }}" class="btn btn-dark"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $character->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                <div class="modal fade" id="modalId-{{ $character->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Attention! Irreversible operation!
                                                    Are sure you want to delete {{ $character->name }} ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">This is an irreversible operation.
                                                Are you sure you want to run it?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('characters.destroy', $character) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <span>Nothing to show...</span>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{ $characters->links('pagination::bootstrap-5') }}
    </div>
@endsection
