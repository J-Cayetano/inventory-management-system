@extends('layouts.default')

@section('title', $title)

@section('contents')
    <div class="container container-tight py-4">

        <div class="card card-md">
            <div class="card-header">
                <h1 class="card-title h2 fw-bolder text-red">You are about to delete a Category!</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route($key . '.destroy', $category->id) }}" enctype="multipart/form-data">
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
                                <strong class="d-block">{{ $category->code }}</strong>
                                <span class="d-block text-muted">Code</span>
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
                                <strong class="d-block">{{ $category->title }}</strong>
                                <span class="d-block text-muted">Title</span>
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
                                <strong class="d-block">{{ $category->created_by }}</strong>
                                <span class="d-block text-muted">Created By</span>
                            </span>
                        </li>
                    </ul>
                    <div class="my-4">
                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                    </div>
                    <p class="text-muted text-justify">
                        Please note that the data you are about to delete will only be <strong>soft deleted</strong>,
                        meaning
                        it will be marked as inactive but not permanently removed from the system.
                    </p>
                </form>

            </div>
        </div>
    </div>
@endsection
