@extends('layouts.app')

@section('content')

<div class="container mt-5" style="margin-top: 120px; ">
    <div class="row mx-auto" style="max-width:600px;">
        @if(count($users) === 0)
            <h3>No results.</h3>
        @else
            <h3>Hits</h3>
            @foreach($users as $user)
                <div class="card p-2 mx-auto " style="margin-top: 12px; border-radius:.7rem;">
                    <x-user :user="$user"/>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
