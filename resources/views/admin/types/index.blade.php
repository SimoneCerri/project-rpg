@extends('layouts.admin')
@section('page-title')
    Characters
@endsection

@section('content')
    <div class="container p-2">



        @include('partials.session')

        <div class="row row-cols-2">
            <div class="col">
                <h3>Add new Type</h3>

                @include('partials.validate')

                <form action="{{ route('admin.types.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="sword" value="{{ old('name') }}" />
                        <small id="nameHelper" class="form-text text-muted">Type name of your types</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="5">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <button class="btn btn-primary" type="submit">
                        Create
                    </button>

                </form>
            </div>
            <div class="col">
                <h2>All Items</h2>
                <div class="table-responsive">
                    <table class="table table-primary">

                        <thead>

                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr class="">
                                    <td scope="row">{{ $type->id }}</td>
                                    <td scope="row">
                                        <form action="{{ route('admin.types.update', $type) }}" method="post"
                                            class="d-flex gap-2">
                                            @csrf

                                            @method('PUT')
                                            <div class="mb-3">

                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" aria-describedby="nameHelper" placeholder="sword"
                                                    value="{{ old('name', $type->name) }}" />
                                                <small id="nameHelper" class="form-text text-muted">Type name of your
                                                    types</small>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <button class="btn btn-warning" type="submit" style="height: 50px">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit
                                            </button>
                                        </form>
                                    </td>
                                    <td scope="row">{{ $type->slug }}</td>

                                    <td scope="row">
                                        <a href="{{ route('admin.types.show', $type) }}" class="btn btn-dark"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>

                                        <button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $type->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Attention! Irreversible operation!
                                                            Are sure you want to delete {{ $type->name }} ?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">This is an irreversible operation.
                                                        Are you sure you want to run it?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <form action="{{ route('admin.types.destroy', $type) }}"
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

                {{ $types->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
@endsection
