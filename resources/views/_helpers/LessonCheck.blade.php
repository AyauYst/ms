<?php
    $PresenceOld = [];
    $CW_Old =[];
    $HW_Old = [];
    $CommentsOld = [];

    if($oldValues!=null)
    {
        foreach ($oldValues as $key => $value)
        {
            if(substr_count($key, 'Presence|')!=0)
                $PresenceOld[str_replace('Presence|','',$key)] = $value;
            else if(substr_count($key, 'HW|')!=0)
                $HW_Old[str_replace('HW|','',$key)] = $value;
            else if(substr_count($key, 'CW|')!=0)
                $CW_Old[str_replace('CW|','',$key)] = $value;
            else if(substr_count($key, 'comment|')!=0)
                $CommentsOld[str_replace('comment|','',$key)] = $value;
        }
    }

?>

<div class="panel panel-default">
    <div class="panel-heading text-center">Group:{{$groupName}}(Lesson:{{$subject}})</div>

    <input type="hidden" value="{{ $group_id }}" name="GRP">
    <input type="hidden" value="{{ $subject_id }}" name="SUBJ">
    <input type="hidden" value="{{ $lesNum }}" name="LesNum">

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="LessonTheme">Lesson Theme:</label>
                <input type="text" class="form-control" id="LessonTheme" name="LessonTheme" value="{{old('LessonTheme')}}" placeholder="Enter Lesson Theme" maxlength="500">
                @if($errors->first('LessonTheme'))
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>ERROR!</strong>{{ $errors->first('LessonTheme')}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {!! Helper::table(
                ['№','Student FIO', 'Missing|Present', 'Home work', 'Class work', 'Comment'],
                null,
                [
                    ['repeat'=>false, 'column_cont'=>$students],
                    [
                        'repeat'=>false,
                        'column_cont'=>Helper::PresenceRadioBtnGroupS($students_idx, $PresenceOld)
                    ],
                    [
                        'repeat'=>false,
                        'column_cont'=>Helper::MarkSelectorsWithCorrectNames($students_idx,'HW',$HW_Old)
                    ],
                    [
                        'repeat'=>false,
                        'column_cont'=>Helper::MarkSelectorsWithCorrectNames($students_idx,'CW',$CW_Old)
                    ],
                    [
                        'repeat'=>false,
                        'column_cont'=>Helper::CommentInputsWithCorrectNames($students_idx,'comment',
                         ['class'=>"form-control", 'placeholder'=>"'Enter comment'", 'maxlength'=>100],$CommentsOld)
                    ]
                ],
                ['class'=>'table']) !!}
    <div class="panel-footer">
        <button type="submit" class="btn btn-success" form ="LessonCheck">Check</button>
    </div>
</div>