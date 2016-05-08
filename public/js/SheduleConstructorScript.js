$(function ()//('document').ready
{
    var wd = $('#weekDays');
    var sel = $('#group_selector');
    var result = $('#result');
    var sbm =  $('#sbm');

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    if (sel.val() == "") {
        wd.hide();
        sbm.hide();
    }
    else {
        wd.show();
        sbm.show();
    }

    sel.change(function ()
    {
        if(sel.val()=="")
        {
            wd.fadeOut();
            sbm.fadeOut();
        }
        else
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
                        for(var i=0;i<6;i++)
                        {
                            for(var wd=0;wd<7;wd++)
                            {
                                var subSel = document.getElementsByClassName('subjSelector')[i+6*wd];
                                subSel.value="";
                                var les_num = i+1;
                                subSel.name = getWeekDay(wd)+"_"+les_num+"_subjSel_id";
                            }
                        }
                    },
                    'html'
                    /*function(response){
                        var fullStr = "";
                        $.each(response.Periods, function(i, period)
                        {
                            var s_t = new Date(period.start_time);
                            var sTime = bildTimeString(s_t);
                            var e_t = new Date(period.end_time);
                            var eTime = bildTimeString(e_t);
                            //fullStr+=period.lesson_number+'|'+sTime+'|'+eTime+'\n';

                            for(var wd=0;wd<7;wd++)
                            {
                                var per = document.getElementsByClassName('period')[i+6*wd];
                                per.innerText = sTime+' - '+eTime;

                                var subSel = document.getElementsByClassName('subjSelector')[i+6*wd];
                                subSel.value="";

                                var les_num = i+1;
                                var subSel = document.getElementsByClassName('subjSelector')[i+6*wd];
                                subSel.name = getWeekDay(wd)+"_"+les_num+"_subjSel_id";
                            }
                        })
                        //alert(fullStr);
                    },
                    'json'*/
                );
            }
            wd.fadeIn();
            sbm.fadeIn();
        }
    });


    function bildTimeString(date)
    {
        var timeStr='';

        if(date.getHours() < 10) timeStr += '0'+ date.getHours()+':';
        else timeStr += date.getHours()+':';
        if(date.getMinutes() < 10) timeStr += '0'+ date.getMinutes()+':';
        else timeStr += date.getMinutes()+':';
        if(date.getSeconds() < 10) timeStr += '0'+ date.getSeconds();
        else timeStr += date.getSeconds();

        return timeStr;
    }

    function getWeekDay(index)
    {
        var day='';
        switch (index)
        {
            case 0:{ day ='Mon'; break;}
            case 1:{ day ='Tue'; break;}
            case 2:{ day ='Wed'; break;}
            case 3:{ day ='Thu'; break;}
            case 4:{ day ='Fri'; break;}
            case 5:{ day ='San'; break;}
            case 6:{ day ='Sat'; break;}
        }
        return day;
    }
});

