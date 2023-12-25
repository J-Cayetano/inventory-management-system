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
                        <option>United Kingdom</option>
                        <option>USA</option>
                        <option>Germany</option>
                        <option>Poland</option>
                        <option>Other…</option>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                    </path>
                                    <path d="M3 7l9 6l9 -6"></path>
                                </svg>
                                Email</a>
                            <a href="#"
                                class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                    </path>
                                </svg>
                                Call</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
