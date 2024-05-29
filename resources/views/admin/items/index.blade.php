@extends('layouts.admin')
@section('page-title')
    Characters
@endsection

@section('content')
    <div class="container p-2">
        <div class="d-flex align-items-center justify-content-between py-4">
            <h2>All Items</h2>
            <a href="{{ route('characters.create') }}" class="btn btn-primary mb-2">Add a new Item</a>
        </div>


        @include('partials.session')



        <div class="table-responsive">
            <table class="table table-primary">

                <thead>

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Type</th>
                        <th scope="col">Category</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Damage Dice</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td scope="row">{{ $item->name }}</td>
                            <td scope="row">{{ $item->slug }}</td>
                            <td scope="row">{{ $item->type }}</td>
                            <td scope="row">{{ $item->category }}</td>
                            <td scope="row">{{ $item->weight }}</td>
                            <td scope="row">{{ $item->cost }}</td>
                            <td scope="row">{{ $item->damage_dice }}</td>
                            <td scope="row">
                                <a href="{{ route('admin.items.show', $item) }}" class="btn btn-dark"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                                <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-dark"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $item->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                <div class="modal fade" id="modalId-{{ $item->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Attention! Irreversible operation!
                                                    Are sure you want to delete {{ $item->name }} ?
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
                                                <form action="{{ route('admin.items.destroy', $item) }}" method="post">
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

        {{ $items->links('pagination::bootstrap-5') }}
    </div>
@endsection
