@extends('layouts.admin')

@section('title', $title)

@section('contents')
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                {{-- Title --}}
                <div class="card-header">
                    <h3 class="card-title">Edit Item Unit - {{ $unit->title }}</h3>
                </div>
                {{-- Body --}}
                <div class="card-body">
                    <form method="POST" action="{{ route($key . '.update', $unit->id) }}" enctype="multipart/form-data"
                        id="edit-form">
                        @csrf
                        @method('PUT')
                        <div class="row g-2">
                            <div class="col-sm-3 p-5">
                                <div class="form-group">
                                    <label class="required form-label"
                                        for="code">{{ __('cruds.units.fields.code') }}</label>
                                    <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                        type="text" name="code" id="code" value="{{ old('code', $unit->code) }}"
                                        required>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <label class="form-check form-switch mt-2 help-block fs-5">
                                        <input class="form-check-input" id="suggested-code" type="checkbox">
                                        <span class="form-check-label">Use Suggested Code</span>
                                    </label>
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.units.fields.code_helper') }}</span>
                                </div>

                            </div>
                            <div class="col-sm-9 p-5">
                                <div class="form-group">
                                    <label class="required form-label" for="title">Title</label>
                                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        type="text" name="title" id="title"
                                        value="{{ old('title', $unit->title) }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @enderror
                                    <span
                                        class="help-block text-info fs-5">{{ __('cruds.units.fields.title_helper') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route($key) }}" class="btn btn-secondary">
                                {{ trans('global.cancel') }}
                            </a>
                            <button class="btn btn-primary" id="submit-button" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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

            $("#title").on("input", function() {
                var inputValue = $(this).val();
                var words = inputValue.split(" ");
                for (var i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                }
                $(this).val(words.join(" "));

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

            $("#code").on("input", function() {
                var inputValue = $(this).val();
                var uppercaseValue = inputValue.toUpperCase();
                $(this).val(uppercaseValue);
            });

            $('#submit-button').on('click', function() {
                var valid = true;

                $("#edit-form :input[required]").each(function() {
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
