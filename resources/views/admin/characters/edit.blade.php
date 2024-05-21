@extends('layouts.app')
@section('content')
    <div class="container">
        @include('partial.validate')
        <form action="{{ route('characters.update', $character) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $character->name }}" />
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
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $character->description) }}/></textarea>
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
