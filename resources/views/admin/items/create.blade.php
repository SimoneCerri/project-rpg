@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.validate')
        <form action="{{ route('admin.items.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="sword" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Type name of your items</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select form-select-lg" name="category" id="category">
                    <option selected disabled>Select One</option>
                    <option value="Martial Ranged">Martial Ranged</option>
                    <option value="Martial Melee">Martial Melee</option>
                    <option value="Simple Ranged">Simple Ranged</option>
                    <option value="Simple Melee">Simple Melee</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight"
                    id="weight" aria-describedby="weightHelper" placeholder="4 lb." />
                <small id="weightHelper" class="form-text text-muted">Type weight of your items</small>
                @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost"
                    aria-describedby="costHelper" placeholder="4 sp" />
                <small id="costHelper" class="form-text text-muted">Type cost of your items</small>
                @error('cost')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="damage_dice" class="form-label">Damage Dice</label>
                <input type="text" class="form-control @error('damage_dice') is-invalid @enderror" name="damage_dice"
                    id="damage_dice" aria-describedby="damage_diceHelper" placeholder="1d6" />
                <small id="damage_diceHelper" class="form-text text-muted">Type damage dice of your items</small>
                @error('damage_dice')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn btn-primary" type="submit">
                Create
            </button>
            <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Previous</a>
        </form>
    </div>
@endsection
