@extends('layouts.admin')

@section('title', $title)

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endsection

@section('contents')
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                {{-- Title --}}
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords($key) }}</h3>
                    <div class="card-actions">
                        {{-- Add --}}
                        <div class="col g-2 text-muted">
                            <div class="input-icon mx-2 d-inline-block">
                                <a class="btn btn-primary add-new" href="{{ route($key . '.create') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        {{-- Search --}}
                        <div class="row">
                            <div class="text-muted">
                                Search:
                                <div class="ms-2 d-inline-block">
                                    <input type="text" id="search-datatable" class="form-control form-control-sm"
                                        aria-label="Search invoice">
                                </div>
                            </div>

                            <div class="text-muted mt-2" id="entries-datatable">
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="ms-auto row">
                            {{-- Show Deleted --}}
                            <div class="g-2 text-muted">
                                <div class="input-icon mx-2 d-inline-block text-center">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="deactivate_switch">
                                        <span class="form-check-label">Show Deleted</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <div></div>
                    <table id="{{ $key }}" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Last Action At</th>
                                <th>Last Action By</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                {{-- Footer --}}
                <div class="card-footer d-flex align-items-center">

                    <p class="m-0 text-muted" id="information-datatable"></p>
                    <div class="pagination m-0 ms-auto" id="pagination-datatable">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var datatable = $('#{{ $key }}').DataTable({
            "ajax": {
                "url": "{{ route($key . '.datatable') }}",
                "method": "POST",
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                "data": {
                    "deactivate_switch": function() {
                        return $('#deactivate_switch').is(':checked');
                    }
                }
            },
            "processing": true,
            "serverSide": true,
            "dom": '<"entries-datatable" l><t><r><"information-datatable" i><"pagination-datatable" p>',
            "columns": [{
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'contact',
                    name: 'contact',
                },
                {
                    data: 'last_action_at',
                    name: 'last_action_at',
                    orderable: true
                },
                {
                    data: 'last_action_by',
                    name: 'last_action_by'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                var status = $(data.status).attr('value');
                if (status === false) {
                    $('#action-button').addClass('disabled hidden');
                }
            }
        });

        var entries = $('.dataTables_length').appendTo('#entries-datatable');
        entries.find('label').addClass('d-flex');
        entries.find('select').addClass('mx-2 text-muted');
        entries.find('select').removeClass('form-select');
        $('.dataTables_paginate').appendTo('#pagination-datatable');
        $('.dataTables_info').appendTo('#information-datatable');

        $('#search-datatable').on('keyup', function() {
            datatable.search($(this).val()).draw();
        });

        $('#deactivate_switch').on('click', function() {
            datatable.ajax.reload();
        });
    </script>
@endsection
