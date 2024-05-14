@extends('layout.app')

@section('content')
<div class="container py-5 text-center">
    <div class="col-12">
                    <div class="card h-100">
                        <div class="card-title bg-dark m-0">
                            <strong class="text-danger">
                                {{ $item->name }}
                            </strong>
                        </div>
                        <div class="card-body bg-secondary">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-4">
                                    <span class="text-warning">
                                        Slug:
                                    </span>
                                    <span>
                                        {{ $item->slug }}
                                    </span>
                                </div>
                                <div class="col-4">
                                    <span class="text-warning">
                                        Type:
                                    </span>
                                    <span>
                                        {{ $item->type }}
                                    </span>
                                </div>
                                <div class="col-4">
                                    <span class="text-warning">
                                        Category:
                                    </span>
                                    <span>
                                        {{ $item->category }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-dark text-white">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-4">
                                    <span class="text-warning">
                                        Weight:
                                    </span>
                                    <span>
                                        {{ $item->weight }}
                                    </span>
                                </div>
                                <div class="col-4">
                                    <span class="text-warning">
                                        Cost:
                                    </span>
                                    <span>
                                        {{ $item->cost }}
                                    </span>
                                </div>
                                <div class="col-4">
                                    <span class="text-warning">
                                        DD:
                                    </span>
                                    <span>
                                        {{ $item->damage_dice }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection