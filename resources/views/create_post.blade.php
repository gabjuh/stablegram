@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Image') }}</div>

                <div class="card-body">
                    <form method="POST" action="/posts" enctype="multipart/form-data"> {{-- action: {{ route('post') }} --}}
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('select an image') }}</label>

                            <div class="col-md-6">

                                <div class="file-upload-wrapper">
                                    <input type="file" name="file_name" id="file_name" class="file-upload" />
                                </div>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row lg-3">
                            <label for="description" class="col-lg-4 col-form-label ">{{ __('description') }}</label>

                            <div class="col-lg-6">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" maxlength="2000" placeholder="Write a few lines about the image. (Maximal length: 2000 chars)">asd</textarea>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mt-3">
                            <div class="col-md-8 ">
                                <a href="{{ url()->previous() }}" type="submit" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
