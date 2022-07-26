<div class="row">
    <div class="col-1 d-flex align-items-center" style="min-width:50px;">
        <x-profile_image
            image="{{ $user->avatar }}"
            size="40"
            class="m-2"
        />
    </div>
    <div class="col-6 ml-3">
        <div style="margin-top: 13px;">
            <span class="fs-5">
                <a href="profile/{{ $user->id }}">
                    {{ $user->name }}
                </a>
            </span>
        </div>
    </div>
</div>
