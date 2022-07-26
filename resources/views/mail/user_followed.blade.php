@component('mail::message')
# You have a new follower! :-)

Dear {{ $recipient->name }},

<img src="{{ asset($follower->avatar) }}" />{{ $follower->name }} follows you on {{ config('app.name') }}!

Sincerely,<br>
{{ config('app.name') }}
@endcomponent
