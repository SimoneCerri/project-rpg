@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.items.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.items.edit', $item) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>



        <div class="col">

            <h3 class=" d-inline">Item Name: </h3>
            <span style="font-size: 30px;">{{ $item->name }}</span>
        </div>


        <div class="metadata">
            <span class="d-block"><strong>Type:</strong> {{ $item->type }}</span>
            <span class="d-block"><strong>Category:</strong> {{ $item->category }}</span>
            <span class="d-block"><strong>Weight:</strong> {{ $item->weight }}</span>
            <span class="d-block"><strong>Cost:</strong> {{ $item->cost }}</span>
            <span class="d-block"><strong>Damage Dice:</strong> {{ $item->damage_dice }}</span>
            <span class="d-block"><strong>Characters:</strong>
                {{ $item->characters ? 'N/A' : 'N/A' }}</span>
        </div>
    </div>




    </div>
@endsection
