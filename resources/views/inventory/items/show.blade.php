@extends('layouts.admin')

@section('title', $title)

@section('contents')
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-5 me-5">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                </div>
                <div class="col">
                    <div class="mb-3">
                        <div class="fs-1 fw-bolder">
                            {{ $item->name }}

                        </div>
                        <div>
                            {!! $item->description !!}
                        </div>
                    </div>
                    <div class="bg-gray-400 p-3 row">
                        <div class="col">
                            <div class="badge bg-azure">Selling Price</div>
                            <div class="text-orange fs-1 fw-bolder">
                                &#8369 {{ $item->selling_price }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="badge bg-purple">Cost Price</div>
                            <div class="text-orange fs-1 fw-bolder">
                                &#8369 {{ $item->cost_price }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="footer-actions">
                <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Back</a>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
