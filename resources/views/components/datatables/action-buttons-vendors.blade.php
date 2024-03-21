<div class="d-flex">
    @can($showGate)
        <a class="btn btn-icon btn-outline-primary me-3" href="{{ route('vendors.show', encrypt($row->id)) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
            </svg>
        </a>
    @endcan

    <div class="dropdown">
        <button id="action-button" class="btn dropdown-toggle align-text-top {{ $row->deleted_at ? 'disabled' : '' }}"
            data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
        <div class="dropdown-menu dropdown-menu-end">


            @can($editGate)
                <a class="dropdown-item" href="{{ route($key . '.edit', $row->id) }}">
                    {{ __('global.edit') }}
                </a>
            @endcan

            @can($deleteGate)
                <a class="dropdown-item text-red" href="{{ route($key . '.delete', $row->id) }}">
                    {{ __('global.delete') }}
                </a>
            @endcan
        </div>
    </div>
</div>
