@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width:25rem;">
    <div class="row" >
        @if(false)
            <p>No results.</p>
        @else
            <div class="card w-25 position-fixed p-2" style="margin-left:350px; margin-top: 32px; border-radius:.7rem;">
                <span>Hits</span>
                @foreach($users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
