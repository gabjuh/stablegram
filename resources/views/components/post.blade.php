<div class="card p-2 m-2" style="border-radius:.7rem; z-index:-1; max-width: 304px;">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <x-profile_image
                image="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png"
                size="40"
                class="m-2"
            />
        </div>
        <div class="col-6">
            <div class="mt-2">
                <span class="fs-5 ml-2">username</span>
            </div>
        </div>
    </div>
    <img
        src="{{ $image }}"
        class="rounded"
        style="object-fit:cover; width:18rem; height:16rem;"
        alt="Post Image"
    >
    <p class="mt-3">
        <small>{{ $created }}</small>
        <span>{{ $likes }} likes</span>
        <a href="#" class="ml-3">Delete post</a>
    </p>
    <p>{{ $text }}</p>
</div>




