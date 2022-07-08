@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-3 d-flex justify-content">
                <x-profile_image
                    image="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png"
                    size="150"
                    class="m-4"
                />
            </div>
            <div class="col-6 ml-4">
                <div>
                    <span class="fs-2">{{ $user->name }}</span>
                    <a class="ml-4" href="#"><small>edit profile</small></a>
                </div>
                <div class="d-flex justify-content-between">
                    <x-info_box
                        title="Posts"
                        value="0"
                    />
                    <x-info_box
                        title="Follower"
                        value="0"
                        class="mx-4"
                    />
                    <x-info_box
                        title="Follows"
                        value="0"
                    />
                </div>
                <a class="btn btn-primary mt-3" href="#">add post</a>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap mt-4">
            <x-post
                image="https://www.akamai.com/site/im-demo/perceptual-standard.jpg?imbypass=true"
                created="five minutes ago"
                likes="1"
                text="a lot of blabla"
            />
        </div>
    </div>
</div>
@endsection
