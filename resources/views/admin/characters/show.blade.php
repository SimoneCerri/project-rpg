@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h3 class="card-title">{{ $character->name }}</h3>
                    <h5 class="card-subtitle">{{ $character->type ? $character->type->name : 'N/A' }} </h5>
                    <div class="card-body">
                        {{ $character->description }}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">{{ $character->attack }}</div>
                            <div class="col-4">{{ $character->defense }}</div>
                            <div class="col-4">{{ $character->speed }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('characters.index') }} " class="btn btn-primary">Previous</a>
    </div>
@endsection
