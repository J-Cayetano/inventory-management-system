@extends('layouts.admin')

@section('contents')
    <div class="row mb-5">
        <div class="col"></div>
        <div class="col-auto">
            <div class="d-flex">
                <input type="search" id="searchInput" class="form-control d-inline-block w-9 me-3" value=""
                    placeholder="Search Product…">
                <button type="button" id="searchSubmitBtn" class="btn btn-primary me-2">
                    {{ __('Search') }}
                </button>
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
                            <small class="text-muted ms-auto">{{ $category->items->count() }}</small>
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
            {{ $items->onEachSide(1)->links() }}

            <div class="row row-cards mb-5">
                @foreach ($items as $item)
                    <div class="col-lg-4">
                        <a href="#" class="card card-link card-link-pop">
                            @if (Carbon\Carbon::now()->diffInDays(Carbon\Carbon::parse($item->created_at)) < 7)
                                <div class="ribbon bg-red">{{ __('New') }}</div>
                            @endif
                            <div class="empty">
                                <div class="empty-img"><img src="{{ asset('storage/' . $item->photo) }}" height="128"
                                        alt="{{ $item->name }}">
                                </div>
                                <p class="empty-title fs-3">
                                    {{ strlen($item->name) > 40 ? substr($item->name, 0, 37) . '...' : $item->name }}</p>
                                <span class="badge bg-secondary-lt">{{ $item->category->title }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{ $items->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
