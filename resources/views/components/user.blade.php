<div class="row">
    <div class="col-2 d-flex align-items-center">
        <x-profile_image
            image="{{ $user->avatar }}"
            size="40"
            class="m-2"
        />
    </div>
    <div class="col-6 ml-3">
        <div style="margin-top: 13px;">
            <span class="fs-5 ml-2">
                <a href="profile/{{ $user->id }}">
                    {{ $user->name }}
                </a>
            </span>
        </div>
    </div>
</div>
