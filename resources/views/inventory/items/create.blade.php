@extends('layouts.admin')

@section('title', $title)

@section('contents')
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                {{-- Title --}}
                <div class="card-header">
                    <h3 class="card-title">Create an Item</h3>
                </div>
                {{-- Body --}}
                <div class="card-body">
                    <form method="POST" action="{{ route($key . '.store') }}" enctype="multipart/form-data" id="create-form">
                        @csrf
                        @method('POST')
                        <div class="row g-2">
                            {{-- Photo --}}
                            <div class="col-sm-4 p-5">
                                <div class="form-group">
                                    <label class="required form-label" for="photo">Photo</label>
                                    <div class="col-auto mb-2"><span class="avatar avatar-xl mb-2"
                                            style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    </div>
                                    <input type="file"
                                        class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo"
                                        id="photo" required>
                                    @error('photo')
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.photo_helper') }}</span>
                                </div>
                            </div>
                            {{-- Code and Name --}}
                            <div class="col-sm-8 p-5">
                                <div class="form-group mb-2">
                                    <label class="required form-label" for="code">Code</label>
                                    <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                        type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <label class="form-check form-switch mt-2 help-block fs-5">
                                        <input class="form-check-input" id="suggested-code" type="checkbox">
                                        <span class="form-check-label">Use Suggested Code</span>
                                    </label>
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.code_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required form-label" for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.name_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-sm-4 p-5">
                                <div class="form-group">
                                    <label class="required form-label" for="category_id">Category</label>
                                    <select class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                                        name="category_id" id="category_id" required>
                                        <option selected disabled>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.category_id_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 p-5">
                                <div class="form-group">
                                    <label class="required form-label" for="supplier_id">Supplier</label>
                                    <select class="form-select {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}"
                                        name="supplier_id" id="supplier_id" required>
                                        <option selected disabled>Select a Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="text-danger">{{ $errors->first('supplier_id') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.supplier_id_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 p-5">
                                <div class="form-group">
                                    <label class="required form-label" for="unit_id">Unit</label>
                                    <select class="form-select {{ $errors->has('unit_id') ? 'is-invalid' : '' }}"
                                        name="unit_id" id="unit_id" required>
                                        <option selected disabled>Select a Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.items.fields.unit_id_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-sm-6 p-5">
                                <label class="required form-label" for="cost_price">Cost Price</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        &#8369
                                    </span>
                                    <input class="form-control {{ $errors->has('cost_price') ? 'is-invalid' : '' }}"
                                        type="number" name="cost_price" id="cost_price"
                                        value="{{ old('cost_price', '') }}" required>
                                </div>
                                @error('cost_price')
                                    <span class="text-danger">{{ $errors->first('cost_price') }}</span>
                                @enderror
                                <span
                                    class="help-block text-info fs-5">{{ __('cruds.items.fields.cost_price_helper') }}</span>
                            </div>
                            <div class="col-sm-6 p-5">
                                <label class="required form-label" for="selling_price">Selling Price</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        &#8369
                                    </span>
                                    <input class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}"
                                        type="number" name="selling_price" id="selling_price"
                                        value="{{ old('selling_price', '') }}" required>
                                </div>
                                @error('selling_price')
                                    <span class="text-danger">{{ $errors->first('selling_price') }}</span>
                                @enderror
                                <span
                                    class="help-block text-info fs-5">{{ __('cruds.items.fields.selling_price_helper') }}</span>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('inventory') }}" class="btn btn-secondary">
                                {{ trans('global.cancel') }}
                            </a>
                            <button class="btn btn-primary" id="submit-button" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                </svg>
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $(".word-case").on("input", function() {
                var inputValue = $(this).val();
                var words = inputValue.split(" ");
                for (var i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                }
                $(this).val(words.join(" "));
            });

            $(".upper-case").on("input", function() {
                var inputValue = $(this).val();
                var uppercaseValue = inputValue.toUpperCase();
                $(this).val(uppercaseValue);
            });

            $('#name').on('input', function() {
                if ($("#suggested-code").prop("checked")) {
                    var abbreviatedTitle = abbreviateWord($(this).val());
                    $("#code").val(abbreviatedTitle);
                }
            });

            $("#suggested-code").change(function() {
                if ($(this).prop("checked")) {
                    $("#code").prop("readonly", true);
                    $("#code").addClass("bg-gray-500");
                } else {
                    $("#code").prop("readonly", false);
                    $("#code").removeClass("bg-gray-500");
                }
            });

            function abbreviateWord(word) {
                word = word.toLowerCase();
                var result = "";
                var letters = ['a', 'e', 'i', 'o', 'u'];
                for (var i = 0; i < word.length; i++) {
                    var currentChar = word[i];
                    var nextChar = i < word.length - 1 ? word[i + 1] : null;

                    if (letters.indexOf(currentChar) === -1) {
                        if (nextChar === null || currentChar !== nextChar) {
                            result += currentChar;
                        }
                    }
                }
                result = result.replace(/\s+/g, '-');
                return result.toUpperCase();
            }

            $("#code").on("input", function() {
                var inputValue = $(this).val();
                var uppercaseValue = inputValue.toUpperCase();
                $(this).val(uppercaseValue);
            });

            $(".upper-case").on("input", function() {
                var inputValue = $(this).val();
                var uppercaseValue = inputValue.toUpperCase();
                $(this).val(uppercaseValue);
            });

            $('#submit-button').on('click', function() {
                var valid = true;

                $("#create-form :input[required]").each(function() {
                    if (!$(this).val()) {
                        valid = false;
                        $(this).addClass("is-invalid");
                    } else {
                        $(this).removeClass("is-invalid");
                    }
                });

                if (valid) {
                    $(this).addClass('disabled');
                } else {
                    $(this).removeClass('disabled');
                }
            });

            function abbreviateWord(word) {
                word = word.toLowerCase();
                var result = "";
                var letters = ['a', 'e', 'i', 'o', 'u'];
                for (var i = 0; i < word.length; i++) {
                    var currentChar = word[i];
                    var nextChar = i < word.length - 1 ? word[i + 1] : null;

                    if (letters.indexOf(currentChar) === -1) {
                        if (nextChar === null || currentChar !== nextChar) {
                            result += currentChar;
                        }
                    }
                }
                result = result.replace(/\s+/g, '-');
                return result.toUpperCase();
            }
        });
    </script>
@endsection
