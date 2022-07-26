@extends('layouts.app')

@section('content')

<div class="container mt-5" style="margin-top: 120px; ">
    <div class="row" >
        @if(false)
            <p>No results.</p>
        @else
            <span>Hits</span>
            @foreach($users as $user)
                <div class="card w-25 p-2" style="margin-left:350px; margin-top: 32px; border-radius:.7rem;">
                    @php
                        // dd($user->avatar)
                    @endphp
                    <x-user :user="$user"/>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
