@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.validate')
        <form action="{{ route('characters.update', $character) }}" method="post" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $character->name }}" />
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select one</option>
                    {{--    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            @if ($type->id !== null) {{ $character->type == old('type_id', $character->type->id) ? 'selected' : '' }}> @endif
                            {{ $type->name }} </option>
                    @endforeach
 --}}
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $character->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach

                </select>
            </div>


            <div class="mb-3">
                <label for="cover_image" class="form-label">Choose file</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" placeholder="" aria-describedby="characterHelper" />
                <div id="characterHelper" class="form-text">Type your image of charcter</div>
            </div>

            <div class="mb-3">
                <label for="attack" class="form-label">Attack </label>
                <input type="text" class="form-control" name="attack" id="attack" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $character->attack }}" />
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label">Defense </label>
                <input type="text" class="form-control" name="defense" id="defense" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $character->defense }}" />
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed </label>
                <input type="text" class="form-control" name="speed" id="speed" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $character->speed }}" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $character->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <button class="btn btn-primary" type="submit">
                Edit
            </button>
            <a href="{{ route('characters.index') }}" class="btn btn-secondary">Previous</a>







        </form>
    </div>
@endsection
