@extends('layouts.company')
@section('content')
{{Auth::id()}}
<div class="container">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<div>
						<p id="date_event"></p>
					</div>
				</div>
				<div class="modal-body">
					<input type="hidden" id="date" name="date">
					<div class="form-group" >
						<input class="form-control" type="text" id="start_time" name="start_time" disabled="">
					</div>
					<div class="input-group bootstrap-timepicker timepicker">
						<input id="end_time" type="text" class="form-control input-small" name="end_time">
						<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button data-token='{{csrf_token()}}' id="create" type="button" class="btn btn-primary" onclick="CrearReserva(this)">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id="calendar"> </div>
</div>
@endsection
@section('scripts')

<script>
	function reload_calendar() {
		var url_calendar='/reserved';
		$('#calendar').fullCalendar({

			defaultView:'agendaWeek',
			header:{
				left:'prev,today,next', 
				center:'title',
				right:'agendaWeek,agendaDay',

			},
			eventSources:
			[
			{
				url:url_calendar,
				error:function() {
					alert('No se pudo cargar la data');
				}
			}
			],
			dayClick: function(start, end, jsEvent, view){

				$("#modal-id").modal("show");
				$('#date_event').empty();
				$('#date_event').append('<h3>Reserva de evento dia '+ moment(start).format('L')+'</h3>');
				$('#start_time').val(moment(start).format('h:mm a'));
				$('#date').val(moment(start).format('YYYY-MM-DD'));
			},

			views:{
				agenda:{
				}
			},
			slotLabelFormat: 'hh:mm a',
			timeFormat: 'hh:mm a', 
			slotDuration:'00:30:00',
			eventLimit:'true',

	        // put your options and callbacks here
	    });
	}
	reload_calendar()

</script>	
<script>
	$('#end_time').timepicker();
	$('#start_time').val('01:00 AM');
</script>
<script>
	function CrearReserva(evt){
		var route='/company/store_reservation' 
		var token= $('#create').data('token')
		console.log($('#start_time').val())
		console.log($('#end_time').val())
		console.log($('#date').val())
		$.ajax({	
			url:route,
			headers:{
				'X-CSRF-TOKEN':token,
			},
			type:'post',
			data:{
				start_time: $('#start_time').val(),
				end_time: $('#end_time').val(),
				date: $('#date').val(),

			},
			success: function(res) {
				console.dir('fdsfg')
				$('#modal-id').modal('toggle')
				window.location = '/company/reservation'
				
			},
			error: function(res) {
				console.dir(res)
			}


		})

		
	}
	$('#calendar').fullCalendar('rerenderEvents')
				
</script>
@endsection