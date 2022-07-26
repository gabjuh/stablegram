@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width:25rem;">
    <div class="row" >
        <div class="d-flex flex-wrap mt-4" >
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    @php
                        $user = $users[$post->user_id - 1];
                        $nrOfLikes = $post->likedBy()->count();
                        $likedByAuthUser = $post->likedBy()->find(Auth::user()->id);
                    @endphp

                    <x-post
                        :user="$user"
                        :post="$post"
                        :nrOfLikes="$nrOfLikes"
                        :likedByAuthUser="$likedByAuthUser"
                        timeline="true"
                    />
                @endforeach
            @endif
        </div>
        <div class="card w-25 position-fixed p-2" style="margin-left:350px; margin-top: 32px; border-radius:.7rem;">
            <span>Friends</span>
            @foreach($following as $user)
                <x-user :user="$user"/>
            @endforeach
        </div>
    </div>
</div>
@endsection
