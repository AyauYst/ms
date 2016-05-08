
    <div id="Mon" class="tab-pane fade in active">
        <table class="table">
            <tr>
                <td>№</td>
                <td>Period</td>
                <td>Subject</td>
            </tr>
            <tr>
                <td class="les_num">1</td>
                <td class="period">{{ $periods[0] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!! $subjects['Monday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">2</td>
                <td class="period">{{ $periods[1] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Monday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">3</td>
                <td class="period">{{ $periods[2] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Monday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">4</td>
                <td class="period">{{ $periods[3] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Monday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">5</td>
                <td class="period">{{ $periods[4] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Monday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">6</td>
                <td class="period">{{ $periods[5] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Monday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <div id="Tue" class="tab-pane fade">
         <table class="table">
             <tr>
                 <td>№</td>
                 <td>Period</td>
                 <td>Subject</td>
             </tr>
             <tr>
                 <td class="les_num">1</td>
                 <td class="period">{{ $periods[0] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Tuesday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
             <tr>
                 <td class="les_num">2</td>
                 <td class="period">{{ $periods[1] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                         {!!$subjects['Tuesday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
             <tr>
                 <td class="les_num">3</td>
                 <td class="period">{{ $periods[2] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                         {!!$subjects['Tuesday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
             <tr>
                 <td class="les_num">4</td>
                 <td class="period">{{ $periods[3] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                         {!!$subjects['Tuesday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
             <tr>
                 <td class="les_num">5</td>
                 <td class="period">{{ $periods[4] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                         {!!$subjects['Tuesday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
             <tr>
                 <td class="les_num">6</td>
                 <td class="period">{{ $periods[5] or "" }}</td>
                 <td>
                        @if(gettype($subjects) == "array")
                         {!!$subjects['Tuesday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
             </tr>
         </table>
     </div>

    <div id="Wed" class="tab-pane fade">
        <table class="table">
            <tr>
                <td>№</td>
                <td>Period</td>
                <td>Subject</td>
            </tr>
            <tr>
                <td class="les_num">1</td>
                <td class="period">{{ $periods[0] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Wednesday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">2</td>
                <td class="period">{{ $periods[1] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Wednesday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">3</td>
                <td class="period">{{ $periods[2] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                        {!!$subjects['Wednesday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">4</td>
                <td class="period">{{ $periods[3] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                        {!!$subjects['Wednesday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">5</td>
                <td class="period">{{ $periods[4] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                        {!!$subjects['Wednesday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">6</td>
                <td class="period">{{ $periods[5] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                        {!!$subjects['Wednesday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <div id="Thu" class="tab-pane fade">
        <table class="table">
            <tr>
                <td>№</td>
                <td>Period</td>
                <td>Subject</td>
            </tr>
            <tr>
                <td class="les_num">1</td>
                <td class="period">{{ $periods[0] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">2</td>
                <td class="period">{{ $periods[1] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">3</td>
                <td class="period">{{ $periods[2] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">4</td>
                <td class="period">{{ $periods[3] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">5</td>
                <td class="period">{{ $periods[4] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">6</td>
                <td class="period">{{ $periods[5] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Thursday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <div id="Fri" class="tab-pane fade">
        <table class="table">
            <tr>
                <td>№</td>
                <td>Period</td>
                <td>Subject</td>
            </tr>
            <tr>
                <td class="les_num">1</td>
                <td class="period">{{ $periods[0] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">2</td>
                <td class="period">{{ $periods[1] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">3</td>
                <td class="period">{{ $periods[2] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">4</td>
                <td class="period">{{ $periods[3] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">5</td>
                <td class="period">{{ $periods[4] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">6</td>
                <td class="period">{{ $periods[5] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Friday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <div id="Sat" class="tab-pane fade">
        <table class="table">
            <tr>
                <td>№</td>
                <td>Period</td>
                <td>Subject</td>
            </tr>
            <tr>
                <td class="les_num">1</td>
                <td class="period">{{ $periods[0] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][1] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">2</td>
                <td class="period">{{ $periods[1] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][2] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">3</td>
                <td class="period">{{ $periods[2] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][3] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">4</td>
                <td class="period">{{ $periods[3] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][4] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">5</td>
                <td class="period">{{ $periods[4] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][5] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
            <tr>
                <td class="les_num">6</td>
                <td class="period">{{ $periods[5] or "" }}</td>
                <td>
                        @if(gettype($subjects) == "array")
                            {!!$subjects['Saturday'][6] !!}
                        @else
                            {!! $subjects !!}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <div id="Sun" class="tab-pane fade">
    <table class="table">
        <tr>
            <td>№</td>
            <td>Period</td>
            <td>Subject</td>
        </tr>
        <tr>
            <td class="les_num">1</td>
            <td class="period">{{ $periods[0] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][1] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
        <tr>
            <td class="les_num">2</td>
            <td class="period">{{ $periods[1] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][2] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
        <tr>
            <td class="les_num">3</td>
            <td class="period">{{ $periods[2] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][3] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
        <tr>
            <td class="les_num">4</td>
            <td class="period">{{ $periods[3] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][4] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
        <tr>
            <td class="les_num">5</td>
            <td class="period">{{ $periods[4] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][5] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
        <tr>
            <td class="les_num">6</td>
            <td class="period">{{ $periods[5] or "" }}</td>
            <td>
                    @if(gettype($subjects) == "array")
                        {!!$subjects['Sunday'][6] !!}
                    @else
                        {!! $subjects !!}
                    @endif
            </td>
        </tr>
    </table>
</div>


    @if(isset($shedule_id))
        <a href="{{route('admin.shedule.edit', $shedule_id)}}" id="EditLink"><i class="fa fa-edit"></i></a>
    @endif



