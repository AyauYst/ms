$(function ()
{
    var wd = $('#weekDays');
    var result = $('#result');
    var sel = $('#group_selector');
    var opP = $('#opPanel');

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


    if (sel.val() == "")
        wd.hide();
    else
        wd.show();

    sel.change(function ()
    {
        opP.empty();
        wd.fadeOut();
        var group_id = sel.val();
        if(group_id!="")
        {
            $.post(
                'shedule4SelectedGroup/'+group_id,
                function(response)
                {

                    result.html(response);

                    var b_GRP = document.getElementById('btnGROUP');
                    opP.html(b_GRP);
                    wd.fadeIn(1000);
                },
                'html'
            );
        }
    });


});

function D_BTN_Click()
{
    document.getElementById('QueryForm').setAttribute('action', document.getElementById('DeleteLink').getAttribute('href'));
    document.getElementById('METHOD').setAttribute('value', 'DELETE');
    document.forms["QueryForm"].submit();
}

function E_BTN_Click()
{
    document.getElementById('QueryForm').setAttribute('action', document.getElementById('EditLink').getAttribute('href'));
    document.getElementById('METHOD').setAttribute('value', 'GET');
    document.forms["QueryForm"].submit();
}