@component('mail::message')
# You have a new follower! :-)

Dear {{ $recipient->name }},

<img
    src="{{ asset( $follower->avatar) }}"
    style="width:35px; height:auto; border-radius:50%; margin-right: .5rem;"
/>
<strong>{{ $follower->name }}</strong> follows you on <strong>{{ config('app.name') }}</strong>!

Sincerely,<br>
{{ config('app.name') }}
@endcomponent
