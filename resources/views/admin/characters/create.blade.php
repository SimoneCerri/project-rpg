@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partial.validate')
        <form action="{{ route('characters.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ old('name') }}" />
            </div>

            <div class="mb-3">
                <label for="attack" class="form-label">Attack </label>
                <input type="text" class="form-control" name="attack" id="attack" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ old('attack') }}" />
            </div>
            <div class="mb-3">
                <label for="defense" class="form-label">Defense </label>
                <input type="text" class="form-control" name="defense" id="defense" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ old('defense') }}" />
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed </label>
                <input type="text" class="form-control" name="speed" id="speed" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ old('speed') }}" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">
                Create
            </button>
            <a href="{{ route('characters.index') }}" class="btn btn-secondary">Previous</a>
        </form>
    </div>
@endsection
