@extends('layouts.admin')
@section('content')
    <div class="container">

        @include('partials.validate')
        <form action="{{ route('characters.update', $character) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="titleHelper" placeholder="Avatar" value="{{ $character->name }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="attack" class="form-label">Attack </label>
                <input type="text" class="form-control @error('attack') is-invalid @enderror" name="attack"
                    id="attack" aria-describedby="titleHelper" placeholder="Avatar" value="{{ $character->attack }}" />
                @error('attack')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label">Defense </label>
                <input type="text" class="form-control @error('defense') is-invalid @enderror" name="defense"
                    id="defense" aria-describedby="titleHelper" placeholder="Avatar" value="{{ $character->defense }}" />
                @error('defense')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed </label>
                <input type="text" class="form-control @error('speed') is-invalid @enderror" name="speed"
                    id="speed" aria-describedby="titleHelper" placeholder="Avatar" value="{{ $character->speed }}" />
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
