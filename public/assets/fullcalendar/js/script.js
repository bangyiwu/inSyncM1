$(function($){

    $('.date-times').mask('00/00/0000 00:00:00');
    $('.time').mask('00:00:00');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#newFastEvent").click(function(){
        clearMessages('.message');
        resetForm("#formFastEvent");
 
        $('#modalFastEvent').modal('show');
        $("#modalFastEvent #titleModal").text('Create fast event');
        $("#modalFastEvent button.deleteFastEvent").css("display", "none");
 
     });

     $(".fc-event").click(function(){
        clearMessages('.message');
        resetForm("#formFastEvent");
        
        let Event = JSON.parse($(this).attr('data-event'));
        $('#modalFastEvent').modal('show');
        $("#modalFastEvent #titleModal").text('Edit fast event');
        $("#modalFastEvent button.deleteFastEvent").css("display", "flex");

        $("#modalFastEvent input[name='id']").val(Event.id);
        $("#modalFastEvent input[name='title']").val(Event.title);
        $("#modalFastEvent input[name='start']").val(Event.start);
        $("#modalFastEvent input[name='end']").val(Event.end);
        $("#modalFastEvent input[name='color']").val(Event.color);
        $("#modalFastEvent textarea[name='description']").val(Event.description);
        $("#modalFastEvent textarea[name='location']").val(Event.location);
 
     });

     $(".saveFastEvent").click(function(){
        
        let id = $("#modalFastEvent input[name='id']").val();
        
        let title = $("#modalFastEvent input[name='title']").val();
        
        let start = $("#modalFastEvent input[name='start']").val();
        
        let end = $("#modalFastEvent input[name='end']").val();

        let color =  $("#modalFastEvent input[name='color']").val();

        let description = $("#modalFastEvent textarea[name='description']").val();
        
        let location = $("#modalFastEvent textarea[name='location']").val();
        
        let Event = {
            title:title,
            start:start,
            end:end,
            color:color,
            description:description,
            location:location,
            user_id:1,
        };
        
        let route;

        if(id==''){
            //console.log('creating new event'); 
            route = routeEvents('routeFastEventStore');
            //Event._method = 'POST';
        } else {
            route = routeEvents('routeFastEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }
        //console.log(Event); 
        sendEvent(route, Event);

    });

    $(".deleteFastEvent").click(function(){
        let id = $("#modalCalendar input[name='id']").val();
        let Event = {
            id:id,
            _method: 'DELETE'
        };

        let route = routeEvents('routeFastEventDelete');
        sendEvent(route,Event);

    });

    $(".deleteEvent").click(function(){
        let id = $("#modalCalendar input[name='id']").val();
        let Event = {
            id:id,
            _method: 'DELETE'
        };

        let route = routeEvents('routeEventDelete');
        sendEvent(route,Event);

    });
    $(".saveEvent").click(function(){
        console.log('button working');
        let id = $("#modalCalendar input[name='id']").val();
        
        let title = $("#modalCalendar input[name='title']").val();
        
        let start = moment($("#modalCalendar input[name='start']").val(),"YYYY-MM-DDTHH:mm").format("YYYY-MM-DD HH:mm:ss");
        
        let end = moment($("#modalCalendar input[name='end']").val(),"YYYY-MM-DDTHH:mm").format("YYYY-MM-DD HH:mm:ss");
        
        let color =  $("#modalCalendar input[name='color']").val();

        let description = $("#modalCalendar textarea[name='description']").val();
        
        let location = $("#modalCalendar textarea[name='location']").val();
        
        let Event = {
            title:title,
            start:start,
            end:end,
            color:color,
            description:description,
            location:location,
        };
        let route;

        if(id==''){
            route = routeEvents('routeEventStore');
        } else {
            route = routeEvents('routeEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }
        sendEvent(route, Event);

    });

  



});

function sendEvent(route, data_){
    console.log(route);
    console.log(data_);
    $.ajax( {
        url:route,
        data:data_,
        method:'POST',
        dataType: 'json',
        success:function(json){
            if(json){
                location.reload();
            }
        },
        error:function(json) {
            let responseJSON = json.responseJSON.errors;

            $(".message").html(loadErrors(responseJSON));
        }
    });
}
function loadErrors(response){
    let boxAlert = `<div class="alert alert-danger">`;

    for(let fields in response){
        boxAlert += `<span>${response[fields]}</span><br/>`;
    }

    boxAlert += `</div>`;

    return boxAlert.replace(/\,/g,"<br/>");
}
function routeEvents(route) {
    return document.getElementById('calendar').dataset[route];
}
function clearMessages(element){
    $(element).text('')
}
function resetForm(form){
    $(form)[0].reset();
}