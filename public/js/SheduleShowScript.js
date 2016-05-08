$(function ()
{
    var wd = $('#weekDays');
    var result = $('#result');
    var sel = $('#group_selector');
    var opP = $('#opPanel');

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


    if (sel.val() == "") {
        wd.hide();
    }
    else {
        wd.show();
    }

    sel.change(function ()
    {
        chek_option(this,result);
    });

    function chek_option(item,rez_container)
    {
        var group_id = sel.val();
        if(group_id!="")
        {
            wd.hide();
            $.post(
                'shedule4SelectedGroup/'+group_id,
                function(response)
                {
                    result.html(response);
                    var link = document.getElementById('EditLink');
                    opP.html(link);
                },
                'html'
            );
            wd.show();
        }
        else
        {
            wd.hide();
        }
    }
});

