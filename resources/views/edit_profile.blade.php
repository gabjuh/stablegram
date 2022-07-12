@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="row">
            <h3 class="my-2">edit profile</h3>
            <div class="card p-3">

                <form action="/profile/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="mt-4">change username:</h5>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $username }}">

                    <h5 class="mt-4">Upload a new profile image:</h5>
                    <div class="file-upload-wrapper">
                        <input type="file" name="avatar" id="avatar" class="file-upload" />
                    </div>

                    <div class="float-right">
                        <a class="btn btn-secondary" href="/profile/{{ Auth::user()->id }}">cancel</a>
                        <input class="btn btn-primary" type="submit" value="save">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

