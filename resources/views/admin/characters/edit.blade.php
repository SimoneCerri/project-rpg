@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.validate')
        <form action="{{ route('characters.update', $character) }}" method="post" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Avatar" value="{{ old('name', $character->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type your name of character</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
                    id="cover_image" placeholder="" aria-describedby="cover_imageHelper"
                    value="{{ old('cover_image', $type->cover_image) }}" />
                <div id="cover_imageHelper" class="form-text">Type your image of charcter</div>
                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="attack" class="form-label">Attack </label>
                <input type="text" class="form-control @error('attack') is-invalid @enderror" name="attack"
                    id="attack" aria-describedby="attackHelper" placeholder="Avatar"
                    value="{{ old('attack', $character->attack) }}" />
                <small id="attackHelper" class="form-text text-muted">Type your name of character</small>
                @error('attack')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label">Defense </label>
                <input type="text" class="form-control @error('defense') is-invalid @enderror" name="defense"
                    id="defense" aria-describedby="defenseHelper" placeholder="Avatar"
                    value="{{ old('defense', $character->defense) }}" />
                <small id="defenseHelper" class="form-text text-muted">Type your name of character</small>
                @error('defense')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed </label>
                <input type="text" class="form-control @error('speed') is-invalid @enderror" name="speed"
                    id="speed" aria-describedby="speedHelper" placeholder="Avatar"
                    value="{{ old('speed', $character->speed) }}" />
                <small id="speedHelper" class="form-text text-muted">Type your name of character</small>
                @error('speed')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description', $character->description) }}</textarea>
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
