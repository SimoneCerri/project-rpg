@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Dashboard') }}
            </h2>


        </div>

        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <div class="continer_btn">
                            <a class="btn btn-primary" href="{{ route('admin.characters.index') }}">Characters manager</a>
                            <a href="{{ route('admin.types.index') }}" class="btn btn-dark">Types manager</a>
                            <a href="{{ route('admin.items.index') }}" class="btn btn-warning">Items manager</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
