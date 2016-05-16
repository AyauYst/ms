
{{ dd($students) }}

@for($i = 0; $i<count($students); $i++)
    <p>{!! $students[$i] !!}</p>
@endfor