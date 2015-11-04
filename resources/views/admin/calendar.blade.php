@extends('layouts.admin')
@section('content')
<div class="container">
	
	<div id="calendar"> </div>
</div>
@endsection
@section('scripts')
<script>
	var url_calendar='/reserved'
	$('#calendar').fullCalendar({

		defaultView:'agendaWeek',
		header:{
			left:'prev,today,next', 
			center:'tittle',
			right:'agendaWeek,agendaDay',

		},
		eventSources: [
		{
			url:url_calendar,
			error:function() {
				alert('No se pudo cargar la data');
			}
		}
		]
		,

		views:{
			agenda:{
			}
		},
		slotLabelFormat: 'hh:mm a',
		timeFormat: 'hh:mm a', 
		slotDuration:'00:30:00',
		eventLimit:'true',

        // put your options and callbacks here
    })

</script>
@endsection