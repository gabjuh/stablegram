<div class="card p-2 m-2" style="border-radius:.7rem; max-width: 304px;">
    <div class="row">
        @if ($view === "all")
            <div class="col-2 d-flex align-items-center">
                <x-profile_image
                    image="{{ $avatar }}"
                    size="40"
                    class="m-2"
                />
            </div>
            <div class="col-6">
                <div class="mt-2">
                    <span class="fs-5 ml-2">
                        <a href="profile/{{ $userId }}">
                            {{ $username }}
                        </a>
                    </span>
                </div>
            </div>
        @endif
    </div>
    <img
        src="{{ config('app.url') }}/storage/{{ isset($userId) ? $userId : Auth::user()->id }}/{{ $image }}"
        class="rounded"
        style="object-fit:cover; width:18rem; height:16rem;"
        alt="Post Image"
    >
    <p class="mt-3">
        <small>{{ $created }}</small>
        <span>{{ $likes != null ? $likes : 0  }} likes</span>
        {{-- <a href="/posts/{id}" class="ml-3">Delete post</a> --}}
        <form action="/posts/{{ $postId }}" method="POST" enctype="multipart/form-data" >
        {{-- <form action="{{ route('post.destroy', [$id]) }}" method="POST" enctype="multipart/form-data" > --}}
            @csrf
            @method('delete')
            <input type="submit" value="Delete post">
        </form>
    </p>
    <p>{{ $text }}</p>
</div>




