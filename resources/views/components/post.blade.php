<div class="card p-2 m-2" style="border-radius:.7rem; max-width: 304px;">
    <div class="row">
        @isset ($timeline)
            <div class="col-2 d-flex align-items-center">
                <x-profile_image
                    image="{{ $user->avatar }}"
                    size="40"
                    class="m-2"
                />
            </div>
            <div class="col-6">
                <div class="mt-2">
                    <span class="fs-5 ml-2">
                        <a href="profile/{{ $user->id }}">
                            {{ $user->name }}
                        </a>
                    </span>
                </div>
            </div>
        @endisset
    </div>
    <img
        src="{{ asset('storage/' .$post->image) }}"
        class="rounded"
        style="object-fit:cover; width:18rem; height:16rem;"
        alt="Post Image"
    >
    <p class="mt-3">
        <small>{{ $post->created_at }}</small>
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('delete')
            <input type="submit" value="Delete post">
        </form>
        <p class="p-block">{{ $post->likes != null ? $post->likes : 0  }} likes</p>
    </p>
    <p>{{ $post->description }}</p>
</div>




