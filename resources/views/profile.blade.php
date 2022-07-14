@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-4 d-flex justify-content-end">
                <x-profile_image
                    image="{{ $user->avatar }}"
                    size="150"
                    class="m-4"
                />
            </div>
            <div class="col-6 ml-4">
                <div>
                    <span class="fs-2">{{ $user->name }}</span>
                    <a class="ml-4" href="/profile/{{ $user->id }}/edit"><small>edit profile</small></a>
                </div>
                <div class="d-flex justify-content-between">
                    <x-info_box
                        title="Posts"
                        value="{{ $nrOfPosts }}"
                    />
                    <x-info_box
                        title="Followers"
                        value="0"
                        class="mx-4"
                    />
                    <x-info_box
                        title="Follows"
                        value="0"
                    />
                </div>
                <a class="btn btn-primary mt-3" href="{{ route('create_post') }}">add post</a>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap mt-4">

            @foreach ($posts as $post)

                <x-post
                    :user="$user"
                    :post="$post"
                />
            @endforeach
        </div>
    </div>
</div>
@endsection
