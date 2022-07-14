@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Image') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_post') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('select an image') }}</label>

                            <div class="col-md-6">

                                <div class="file-upload-wrapper">
                                    <input type="file" name="image" id="image" class="file-upload" />
                                </div>
                                <x-error name="image" />

                            </div>
                        </div>

                        <div class="row lg-3">
                            <label for="description" class="col-lg-4 col-form-label text-right">{{ __('description') }}</label>

                            <div class="col-lg-6">
                                <textarea
                                    class="form-control"
                                    name="description"
                                    id="description"
                                    cols="30"
                                    rows="5"
                                    maxlength="2000"
                                    placeholder="Write a few lines about the image. (Maximal length: 2000 chars)"
                                    >{{ old('description') }}</textarea>
                                <x-error name="description" />
                            </div>
                        </div>

                        <div class="float-right mt-3">
                            <a href="{{ url()->previous() }}" type="submit" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
