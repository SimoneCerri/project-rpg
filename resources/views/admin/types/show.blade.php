@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.types.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

        </div>

        <div class="row row-cols-2 py-3">

            {{-- show type --}}
            <div class="col">
                <div class="project_info pb-4">
                    <h3 class=" d-inline">Type Name: </h3>
                    <span style="font-size: 30px;">{{ $type->name }}</span>
                </div>


                <div class="metadata p-2" style="height: 600px; overflow-y:auto">
                    <p align="justify">
                        <strong>Description: </strong>
                        <br />
                        {{ $type->desc ? $type->desc : 'N/A' }}
                    </p>
                </div>
            </div>

            {{-- edit type --}}
            <div class="col">

                <h2>Edit Type</h2>

                <form action="{{ route('admin.types.update', $type) }}" method="post">
                    @csrf
                    @method('PUT')

                    {{-- input name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="sword"
                            value="{{ old('name', $type->name) }}" />
                        <small id="nameHelper" class="form-text text-muted">Type name of your types</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- input desc --}}
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="10">{{ old('desc', $type->desc) }}</textarea>
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    {{-- button that a click post data to update --}}
                    <button class="btn btn-warning" type="submit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        EDIT
                    </button>

                </form>
            </div>
        </div>



    </div>




    </div>
@endsection
