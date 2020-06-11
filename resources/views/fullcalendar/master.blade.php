<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
@include('inc.navbar')
@include('fullcalendar.modal-calendar')
@include('fullcalendar.modal-fastEvents')

  <div id='wrap'>

    <div id='external-events'>
      <h4>Fast Events</h4>

      <div id='external-events-list'>
         @if($fastEvents )
            @foreach($fastEvents as $fastEvent)
            <div 
            style="padding: 4px; border: 1px solid {{$fastEvent->color}}; background-color:{{$fastEvent->color}};"
            class='fc-event' 
            data-event='{"id":"{{$fastEvent->id}}", "title":"{{$fastEvent->title}}", "color" : "{{$fastEvent->color}}", "start":"{{$fastEvent->start}}", "end":"{{$fastEvent->end}}", "description":"{{$fastEvent->description}}", "location":"{{$fastEvent->location}}"}'>{{$fastEvent->title}}</div>
            @endforeach
        @endif
      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
        <button class="btn btn-sm btn-success" id = "newFastEvent">Create fast event</button>
      </p>
    </div>

    <div 
      id='calendar'
      data-route-load-events="{{route('routeLoadEvents')}}"
      data-route-event-update="{{route('routeEventUpdate')}}"
      data-route-event-store="{{route('routeEventStore')}}"
      data-route-event-delete="{{route('routeEventDelete')}}"

      data-route-fast-event-delete="{{route('routeFastEventDelete')}}"
      data-route-fast-event-update="{{route('routeFastEventUpdate')}}"
      data-route-fast-event-store="{{route('routeFastEventStore')}}"

      ></div>

    <div style='clear:both'></div>

  </div>
    <script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
    <script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
    <script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
    <script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>
    <script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>

</body>
</html>
