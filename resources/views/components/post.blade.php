<div class="card p-2 m-2" style="border-radius:.7rem; max-width: 304px;">
    <div class="row">
        @isset ($timeline)
            <x-user :user="$user"/>
        @endisset
    </div>
    <img
        src="{{ asset('storage/' .$post->image) }}"
        class="rounded"
        style="object-fit:cover; width:18rem; height:16rem;"
        alt="Post Image"
    >
    <p class="mt-3">

        <div class="d-flex">

            <form action="/posts/like/{{$post->id}}" method="POST">
                @csrf
                @if($post->likedBy->find(Auth::user()))
                    <input class="btn btn-link m-0 p-0" type="submit" value="unlike">
                @else
                    <input class="btn btn-link m-0 p-0" type="submit" value="like">
                @endif
            </form>

            <p class="ml-3">{{ $post->likedBy != null ? $post->likedBy->count() : 0  }} like(s)</p>

        </div>

        @if (Auth::user()->id === $user->id)
            <div class="d-flex">
                <small class="mr-3">{{ $post->created_at }}</small>

                <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('delete')
                    <input class="btn btn-link m-0 p-0" type="submit" value="Delete post">
                </form>
            </div>
        @endif
    </p>
    <p>{{ $post->description }}</p>
</div>




