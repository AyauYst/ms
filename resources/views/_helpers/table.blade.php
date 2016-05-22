<?php
/*
 * headers[] = ['h4_col1','h4_col2' ... 'h4_colN']
 * content[] = [
 *                  [
 *                      'repeat' => TRUE,
 *                      'column_cont' => 'VALUE_4_ALL_ROWS'
 *                  ]//content 4 column 1
 *                  ..........
 *                  [
 *                      'repeat' => FALSE,
 *                      'column_cont' => [row1,row2 ... rowN]
 *                  ] //content 4 column N
 *              ]
 * attr[] = ['class'=>'table', 'border'=>'2' ... 'some_attr' = 'some_val']
 */

    $ROWS = 0;
    $COLS = count($content);

    for($i=0;$i<$COLS;$i++)
    {
        if(!$content[$i]['repeat'])
        {
            if($ROWS<count($content[$i]['column_cont']))
                $ROWS = count($content[$i]['column_cont']);
        }
    }

    $ROW_NUMS = array_search('№', $headers);
?>


<table
        @foreach($attr as $key => $value)
            {{ "$key = $value " }}
        @endforeach
>
    @if(count($headers)!=0)
        <tr class="text-center">
            @if(is_numeric($ROW_NUMS))
                <td>{{$headers[$ROW_NUMS]}}</td>
            @else
                <td></td>
            @endif

            @for($h_idx=0; $h_idx<count($headers); $h_idx++)
                @if($h_idx !== $ROW_NUMS)
                    <td>{{$headers[$h_idx]}}</td>
                @endif
            @endfor
        </tr>
    @endif

    @for($r_idx=0; $r_idx<$ROWS; $r_idx++)
        <tr class="text-center">
            <td>{{$r_idx+1}}</td>
            @for($c_idx=0; $c_idx<$COLS; $c_idx++)
                @if($content[$c_idx]['repeat'])
                    <td>{!! $content[$c_idx]['column_cont'] or null !!}</td>
                @else
                    <td>{!! $content[$c_idx]['column_cont'][$r_idx] or null !!}</td>
                @endif
            @endfor
        </tr>
    @endfor
</table>
