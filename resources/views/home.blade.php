@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width:25rem;">
    <div class="row" >
        <div class="d-flex flex-wrap mt-4" >
            <x-post
                image="https://www.akamai.com/site/im-demo/perceptual-standard.jpg?imbypass=true"
                created="five minutes ago"
                likes="1"
                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime perspiciatis officiis, reiciendis repudiandae fugit magni tenetur incidunt nihil enim esse explicabo, quae architecto distinctio quo libero accusantium minima eum eveniet natus quos officia ducimus? Repudiandae officiis sit, hic ducimus odio non minus dolore voluptas tempora adipisci cumque, nobis inventore eos."
            />
            <x-post
                image="https://www.akamai.com/site/im-demo/perceptual-standard.jpg?imbypass=true"
                created="five minutes ago"
                likes="1"
                text="a lot of blabla"
            />
            <x-post
                image="https://www.akamai.com/site/im-demo/perceptual-standard.jpg?imbypass=true"
                created="five minutes ago"
                likes="1"
                text="a lot of blabla"
            />
        </div>
        <div class="card w-25 position-fixed p-2" style="margin-left:350px; margin-top: 32px; border-radius:.7rem;">
            <span>Friends</span>

        </div>
    </div>
</div>
@endsection
