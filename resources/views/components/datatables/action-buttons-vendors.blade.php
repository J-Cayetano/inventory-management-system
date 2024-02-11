<div class="dropdown">
    <button id="action-button" class="btn dropdown-toggle align-text-top {{ $row->deleted_at ? 'disabled' : '' }}"
        data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
    <div class="dropdown-menu dropdown-menu-end">
        @can($showGate)
            <a class="dropdown-item" href="{{ route($key . '.show', $row->id) }}">
                {{ __('global.show') }}
            </a>
        @endcan

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
