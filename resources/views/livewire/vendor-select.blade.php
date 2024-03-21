<div>
    <select class="form-select" wire:model.live="selectedVendor">
        <option value="0" selected disabled>Select a Vendor</option>
        @foreach ($vendors as $data)
            <option value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
    </select>
</div>
