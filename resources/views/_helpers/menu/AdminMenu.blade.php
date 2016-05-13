    <li><a href="{{ url('/admin') }}">Home</a></li>

    <li class="dropdown">
        <a href="" class="dropdown-toggle"
           data-toggle="dropdown">Student<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{route('admin.students.create')}}">Create</a></li>
            <li><a href="{{route('admin.students.index')}}">Show all student</a></li>
        </ul>

    </li>

    <li class="dropdown">
        <a href="" class="dropdown-toggle"
           data-toggle="dropdown">Teacher<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{route('admin.teachers.create')}}">Create</a></li>
            <li><a href="{{route('admin.teachers.index')}}">Show all teachers</a></li>
        </ul>

    </li>

    <li class="dropdown">
        <a href="" class="dropdown-toggle"
           data-toggle="dropdown">Shedule<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{route('admin.shedule.create')}}">Create</a></li>
            <li><a href="{{route('admin.shedule.index')}}">Show shedule</a></li>
        </ul>
    </li>