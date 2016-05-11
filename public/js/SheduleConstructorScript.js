$(function ()//('document').ready
{
    var wd = $('#weekDays');
    var sel = $('#group_selector');
    var result = $('#result');
    var sbm =  $('#sbm');

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    if (sel.val() == "")
        { wd.hide(); sbm.hide(); }
    else
        { wd.show(); sbm.show(); }

    sel.change(function ()
    {
        wd.fadeOut();
        sbm.fadeOut();
        var group_id = sel.val();
        if(group_id!="")
        {
            $.post(
                'getData4CreateShedule/'+group_id,
                function(response)
                {
                    result.html(response);
                    wd.fadeIn(1000);
                    sbm.fadeIn(1000);
                },
                'html'
            );
        }
    });
});

