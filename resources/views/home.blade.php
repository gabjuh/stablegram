@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width:25rem;">
    <div class="row" >
        <div class="d-flex flex-wrap mt-4" >
            @foreach ($posts as $post)
                @php
                    $user = $users[$post->user_id - 1];
                    if(isset($user->avatar)) {
                        $avatar = '/storage/'.$user->id.'/'.$user->avatar;
                    } elseif (isset($user->oauth_avatar)) {
                        $avatar = $user->oauth_avatar;
                    } else {
                        $avatar = $image_placeholder;
                    }
                @endphp
                <x-post
                    {{-- userId="{{ $post->user_id }}" --}}
                    postId="{{ $post->id }}"
                    userId="{{ $post->user_id }}"
                    username="{{ $users[$post->user_id - 1]->name }}"
                    {{-- avatar="{{ $users[$post->user_id - 1]->avatar ?: $image_placeholder }}" --}}
                    avatar="{{ $avatar }}"
                    image="{{ $post->file_name }}"
                    created="{{ $post->created_at }}"
                    likes="{{ $post->likes }}"
                    text="{{ $post->description }}"
                    view="all"
                />
            @endforeach
        </div>
        <div class="card w-25 position-fixed p-2" style="margin-left:350px; margin-top: 32px; border-radius:.7rem;">
            <span>Friends</span>
            <img src="{{ asset('storage/img.jpg') }}" alt="">

        </div>
    </div>
</div>
@endsection
