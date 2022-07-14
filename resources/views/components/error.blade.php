@if ($errors->has($name))
    <p class="text-danger">{{$errors->first($name)}}</p>
@endif
