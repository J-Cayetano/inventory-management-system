@extends('layouts.default')

@section('title', $title)

@section('contents')
    <div class="container container-tight py-4">

        <div class="card card-md">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                </div>
            </div>
            <div class="card-header p-5">
                <h1 class="card-title h2 fw-bolder text-red">You are about to delete a {{ substr(ucwords($key), 0, -1) }}!
                </h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route($key . '.destroy', $unit->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <h3 class="mb-3">Please confirm the details before deleting.</h3>
                    <ul class="list-unstyled space-y">
                        <li class="row g-2">
                            <span class="col-auto"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                            </span>
                            <span class="col">
                                <strong class="d-block">{{ $unit->code }}</strong>
                                <span class="d-block text-muted">{{ __('cruds.' . $key . '.fields.code') }}</span>
                            </span>
                        </li>
                        <li class="row g-2">
                            <span class="col-auto"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                            </span>
                            <span class="col">
                                <strong class="d-block">{{ $unit->name }}</strong>
                                <span class="d-block text-muted">{{ __('cruds.' . $key . '.fields.name') }}</span>
                            </span>
                        </li>
                        <li class="row g-2">
                            <span class="col-auto"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                            </span>
                            <span class="col">
                                <strong class="d-block">{{ $unit->created_by }}</strong>
                                <span class="d-block text-muted">{{ __('cruds.' . $key . '.fields.created_by') }}</span>
                            </span>
                        </li>
                    </ul>
                    <div class="my-4 d-flex">
                        <a href="{{ route($key . '.index') }}" class="btn btn-secondary w-100 m-2">Cancel</a>
                        <button type="submit" class="btn btn-ghost-danger w-100 m-2">Delete</button>
                    </div>
                    <p class="text-muted text-justify">
                        Please note that the data you are about to delete will only be <strong>deactivated</strong>,
                        meaning it will be marked as inactive but not permanently removed from the system.
                    </p>
                </form>

            </div>
        </div>
    </div>
@endsection
