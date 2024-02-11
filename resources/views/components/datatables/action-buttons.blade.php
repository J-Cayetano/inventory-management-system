<div class="dropdown">
    <button id="action-button" class="btn dropdown-toggle align-text-top {{ $row->deleted_at ? 'disabled' : '' }}"
        data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
    <div class="dropdown-menu dropdown-menu-end">
        @can($editGate)
            <a class="dropdown-item" href="{{ route($key . '.edit', $row->id) }}">
                {{ trans('global.edit') }}
            </a>
        @endcan

        @can($deleteGate)
            <a class="dropdown-item text-red" href="{{ route($key . '.delete', $row->id) }}">
                {{ trans('global.delete') }}
            </a>
        @endcan
    </div>
</div>
