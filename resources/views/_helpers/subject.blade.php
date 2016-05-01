<select
@foreach($attrs as $key => $value)
    {!! $key."='$value'" !!}
        @endforeach
>
    @if($first_option)
        <option value="">{{$first_option}}</option>
    @endif
    @foreach($options as $option)
        @if($selected == $option['subject_id'])
            <option value="{{$option['subject_id']}}" selected>{{$option['name']}}</option>
        @else
            <option value="{{$option['subject_id']}}">{{$option['name']}}</option>
        @endif
    @endforeach
</select>