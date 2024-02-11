@extends('layouts.admin')

@section('title', $title)

@section('contents')
    <div class="row row-deck row-cards">
        {{-- Quick Links --}}
        <div class="col-12">
            <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-click" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12l3 0" />
                            <path d="M12 3l0 3" />
                            <path d="M7.8 7.8l-2.2 -2.2" />
                            <path d="M16.2 7.8l2.2 -2.2" />
                            <path d="M7.8 16.2l-2.2 2.2" />
                            <path d="M12 12l9 3l-4 2l-2 4l-3 -9" />
                        </svg>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h3 class="h1">Quick Links</h3>
                            <div class="markdown text-muted">
                                Step into our comprehensive inventory management system, where precision and efficiency
                                converge to streamline your organizational processes. Welcome to a realm where meticulous
                                control meets seamless operation!
                            </div>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col p-2">
                                        <a href="{{ route('inventory.gallery') }}" class="btn btn-ghost-info w-100">
                                            Inventory Management (Dashboard)
                                        </a>
                                    </div>
                                    <div class="col p-2">
                                        <a href="{{ route('vendors') }}" class="btn btn-ghost-info w-100">
                                            Vendors
                                        </a>
                                    </div>
                                    <div class="col p-2">
                                        <a href="#" class="btn btn-ghost-secondary disabled w-100">
                                            Purchase Order
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class=" hr mt-5">

        <div class="h1">
            Rates
        </div>
        {{-- Stock Out Rate --}}
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Stack Out Rate</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">10%</div>
                    <div class="d-flex mb-2">
                        <div>Total rate</div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 10%" role="progressbar" aria-valuenow="10"
                            aria-valuemin="0" aria-valuemax="100" aria-label="10% Complete">
                            <span class="visually-hidden">10% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class=" hr mt-5">

        <div class="h1">
            Numerical
        </div>
        {{-- Vendors --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span
                                class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                2 Total Pending Orders
                            </div>
                            <div class="text-muted">
                                32 Total Received
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
