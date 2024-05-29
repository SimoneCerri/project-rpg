@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.types.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

        </div>



        <div class="col">

            <h3 class=" d-inline">Type Name: </h3>
            <span style="font-size: 30px;">{{ $type->name }}</span>
        </div>


        <div class="metadata">
            <p>
                <strong>Description: </strong>
                {{ $type->desc ? $type->desc : 'N/A' }}
            </p>
        </div>
    </div>




    </div>
@endsection
