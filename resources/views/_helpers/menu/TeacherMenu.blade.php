<li><a href="{{ url('/teacher') }}">Home</a></li>
<li><a href="{{ url('/teacher/shedule') }}">Shedule</a></li>
<li><a href="{{ url('/teacher/lesson/0/0' ) }}">Note lesson</a></li>


<li class="dropdown">
    <a href="" class="dropdown-toggle"
       data-toggle="dropdown">Statistics groups<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/teacher/stat_vis_groups') }}">Visits</a></li>
        <li><a href="{{ url('/teacher/stat_prog_groups') }}">Progress</a></li>
    </ul>
</li>