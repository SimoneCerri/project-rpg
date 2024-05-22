@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.validate')
        <form action="{{ route('characters.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="titleHelper" placeholder="Avatar" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="attack" class="form-label">Attack </label>
                <input type="text" class="form-control @error('attack') is-invalid @enderror" name="attack"
                    id="attack" aria-describedby="titleHelper" placeholder="Avatar" value="{{ old('attack') }}" />
                @error('attack')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label">Defense </label>
                <input type="text" class="form-control @error('defense') is-invalid @enderror" name="defense"
                    id="defense" aria-describedby="titleHelper" placeholder="Avatar" value="{{ old('defense') }}" />
                @error('defense')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed </label>
                <input type="text" class="form-control @error('speed') is-invalid @enderror" name="speed"
                    id="speed" aria-describedby="titleHelper" placeholder="Avatar" value="{{ old('speed') }}" />
                @error('speed')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                Create
            </button>
            <a href="{{ route('characters.index') }}" class="btn btn-secondary">Previous</a>
        </form>
    </div>
@endsection
