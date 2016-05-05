<?php

class Helper
{
    public static function select($options = [], $selected = 1, $first_option = '', $attrs = [])
    {
        return view('_helpers.select')
            ->with('options', $options)
            ->with('selected', $selected)
            ->with('first_option',$first_option)
            ->with('attrs', $attrs);
    }
    
    public static function testSheduleView()
    {
        return view('_helpers.testSheduleView');
    }
}