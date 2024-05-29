@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.validate')

        <div class="d-flex align-items-center justify-content-between">
            <h1>Add new Item</h1>
            <a href="{{ route('admin.items.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

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
                    <option value="Martial Ranged" {{ old('category') == 'Martial Ranged' ? 'selected' : ' ' }}>Martial
                        Ranged</option>
                    <option value="Martial Melee" {{ old('category') == 'Martial Melee' ? 'selected' : ' ' }}>Martial Melee
                    </option>
                    <option value="Simple Ranged" {{ old('category') == 'Simple Ranged' ? 'selected' : ' ' }}>Simple Ranged
                    </option>
                    <option value="Simple Melee" {{ old('category') == 'Simple Melee' ? 'selected' : ' ' }}>Simple Melee
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight"
                    id="weight" aria-describedby="weightHelper" placeholder="4 lb." value="{{ old('weight') }}" />
                <small id="weightHelper" class="form-text text-muted">Type weight of your items</small>
                @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost"
                    aria-describedby="costHelper" placeholder="4 sp" value="{{ old('cost') }}" />
                <small id="costHelper" class="form-text text-muted">Type cost of your items</small>
                @error('cost')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="damage_dice" class="form-label">Damage Dice</label>
                <input type="text" class="form-control @error('damage_dice') is-invalid @enderror" name="damage_dice"
                    id="damage_dice" aria-describedby="damage_diceHelper" placeholder="1d6"
                    value="{{ old('damage_dice') }}" />
                <small id="damage_diceHelper" class="form-text text-muted">Type damage dice of your items</small>
                @error('damage_dice')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn btn-primary" type="submit">
                Create
            </button>

        </form>
    </div>
@endsection
