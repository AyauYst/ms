<select
@foreach($attrs as $key => $value)
    {!! $key."='$value'" !!}
        @endforeach
        >
    @if($first_option)
        <option value="">{{$first_option}}</option>
    @endif
    @foreach($options as $option)
        @if($selected == $option['group_id'])
            <option value="{{$option['group_id']}}" selected>{{$option['name']}}</option>
        @else
            <option value="{{$option['group_id']}}">{{$option['name']}}</option>
        @endif
    @endforeach
</select>