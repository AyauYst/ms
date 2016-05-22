<input value="{{$value}}" type="text" name={{$name}}
    @foreach($attr as $key => $value)
        {!! "$key=$value" !!}
    @endforeach
>
