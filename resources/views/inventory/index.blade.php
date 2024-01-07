@extends('layouts.admin')

@section('title', $title)

@section('contents')
    <div class="row mb-5">
        <div class="col-sm-9">
            <div class="input-icon">
                <input type="text" value="" class="form-control" placeholder="Search…">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                        <path d="M21 21l-6 -6"></path>
                    </svg>
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="g-2 text-muted">
                <div class="input-icon d-inline-block">
                    <a class="btn btn-primary" href="{{ route($key . '.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Add New Item
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-3">
            <form action="./" method="get" autocomplete="off" novalidate>
                <div class="subheader mb-2">Category</div>
                <div class="list-group list-group-transparent mb-3">
                    @foreach ($categories as $category)
                        <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                            {{ $category->title }}
                            <small class="text-muted ms-auto">24</small>
                        </a>
                    @endforeach
                </div>
                <div class="subheader mb-2">Supplier</div>
                <div>
                    <select name="supplier" class="form-select">
                        <option selected disabled>Select a Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-100 mb-2">
                        Confirm changes
                    </button>
                    <a href="#" class="btn btn-link w-100">
                        Reset to defaults
                    </a>
                </div>
            </form>
        </div>
        <div class="col-9">
            <div class="row row-cards">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 rounded"
                                style="background-image: url({{ asset('static/items/s22-ultra.jpg') }})"></span>
                            <h3 class="m-0 mb-1"><a href="#">Paweł Kuna</a></h3>
                            <div class="text-muted">UI Designer</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">Owner</span>
                            </div>
                        </div>
                        {{-- Actions --}}
                        <div class="d-flex">
                            <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                                View</a>
                            <a href="#"
                                class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                </svg>
                                Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
