<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bare - Start Bootstrap Template</title>
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
    <!-- Bootstrap Core CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='js/moment.min.js'></script>
	<!-- jQuery Version 1.9.1 -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js" integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ=" crossorigin="anonymous"></script>
	<!-- FullCalendar -->
	<script src='js/fullcalendar.min.js'></script>
	 <!-- Bootstrap Core JavaScript -->
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

    <!-- Custom CSS -->
	<style>
        #calendar {
            max-width: 1200px;
            margin-bottom: 30px;
        }
        .nocheckbox {
            display: none;
        }
        .label-on {
            border-radius: 3px;
            background: red;
            color: #ffffff;
            padding: 6px 10px;
            border: 1px solid red;
            display: table-cell;
        }
        .label-off {
            border-radius: 3px;
            background: white;
            border: 1px solid red;
            padding: 6px 10px;
            display: table-cell;
        }

        #repeat-form {
            display: none;
        }
        #calendar a.fc-event {
            color: #fff; /* bootstrap default styles make it black. undo */
            background-color: #0065A6;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="col-lg-12 text-center">
		<div style="height:20px"></div>
			<div id="calendar" class="col-centered">
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" method="POST" action="addEvent-json.php">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Add Event</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="start" class="col-sm-12 control-label">Start date</label>
							<div class="col-sm-12">
								<input type="text" name="start" class="form-control" id="start" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="end" class="col-sm-12 control-label">End date</label>
							<div class="col-sm-12">
								<input type="text" name="end" class="form-control" id="end" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="title" class="col-sm-12 control-label">Title</label>
							<div class="col-sm-12">
								<input type="text" name="title" class="form-control" id="title" placeholder="Title">
							</div>
						</div>
						<div class="form-group">
							<label for="color" class="col-sm-12 control-label">Color</label>
							<div class="col-sm-12">
								<select name="color" class="form-control" id="color">
									<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
									<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
									<option style="color:#008000;" value="#008000">&#9724; Green</option>						  
									<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
									<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
									<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
									<option style="color:#000;" value="#000">&#9724; Black</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="description" class="col-12 control-label">Description</label>
							<div class="col-12">
								<input type="text" name="description" class="form-control" id="description" placeholder="Description">
							</div>
						</div>
						<div class="form-group">
							<label for="repeat" class="col-sm-12 control-label">Recurrence</label>
							<div class="col-sm-12">
								<select name="repeat" class="form-control" id="repeat">
									<option id="no" selected="selected" value="no">no</option>
									<option id="yes" value="yes">yes</option>
								</select>
							</div>
						</div>
					</div>
					<script>
						var repeat = $('#repeat');
						var select = this.value;
						repeat.change(function () {
							if ($(this).val() == 'yes') {
								$('#repeat-form').show();
							} else {
								$('#repeat-form').hide();
							}
						});
					</script>
				</div>
				<div id="repeat-form">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Add Recurrence</h5>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">   
							<label class="col-md-12 control-label" for="checkboxes">Day(s) of Week</label>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="col-md-1 checkbox-inline" for="checkboxes-0">
									<input type="checkbox" name="dowID[]" id="checkboxes-0" value="6">Su
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-1">
									<input type="checkbox" name="dowID[]" id="checkboxes-1" value="0">Mo
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-2">
									<input type="checkbox" name="dowID[]" id="checkboxes-2" value="1">Tu
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-3">
									<input type="checkbox" name="dowID[]" id="checkboxes-3" value="2">We
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-4">
									<input type="checkbox" name="dowID[]" id="checkboxes-4" value="3">Th
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-5">
									<input type="checkbox" name="dowID[]" id="checkboxes-5" value="4">Fr
								</label>
								<label class="col-md-1 checkbox-inline" for="checkboxes-6">
									<input type="checkbox" name="dowID[]" id="checkboxes-6" value="5">Sa
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="startDate" class="col-sm-12 control-label">Start Recurrence</label>
							<div class="col-sm-12">
								<input type="text" name="startDate" class="form-control" id="startDate" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="endDate" class="col-sm-12 control-label">End Recurrence</label>
							<div class="col-sm-12">
								<input type="text" name="endDate" class="form-control" id="endDate">
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		
	<!-- Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" method="POST" action="editEventTitle-json.php">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="start" class="col-sm-12 control-label">Start date</label>
							<div class="col-sm-12">
								<input type="text" name="start" class="form-control" id="start" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="end" class="col-sm-12 control-label">End date</label>
							<div class="col-sm-12">
								<input type="text" name="end" class="form-control" id="end" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="title" class="col-sm-12 control-label">Title</label>
							<div class="col-sm-12">
								<input type="text" name="title" class="form-control" id="title" placeholder="Title">
							</div>
						</div>
						<div class="form-group">
							<label for="color" class="col-sm-12 control-label">Color</label>
							<div class="col-sm-12">
								<select name="color" class="form-control" id="color">
									<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
									<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
									<option style="color:#008000;" value="#008000">&#9724; Green</option>						  
									<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
									<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
									<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
									<option style="color:#000;" value="#000">&#9724; Black</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="description" class="col-12 control-label">Description</label>
							<div class="col-12">
								<input type="text" name="description" class="form-control" id="description" placeholder="Description">
							</div>
						</div>
						<div class="form-group" id="del"> 
							<label class="col-sm-12 control-label">Delete Event</label>
							<div class="col-sm-12">
								<label onclick="toggleCheck('check1');" class="label-off" for="check1" id="check1_label">Delete</label>
							</div>
							<input class="nocheckbox" type="checkbox" id="check1" name="delete">
						</div>
					</div>
					<script>
					function toggleCheck(check) {
						if ($('#'+check).is(':checked')) {
							$('#'+check+'_label').removeClass('label-on');
							$('#'+check+'_label').addClass('label-off');
						} else {
							$('#'+check+'_label').addClass('label-on');
							$('#'+check+'_label').removeClass('label-off');
						}
					}		  
					</script>
				</div>
				<div id="editRepeat">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Edit Recurrence</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="status" class="col-sm-12 control-label">Recurrence Status</label>
							<div class="col-sm-12">
								<input type="text" name="status" class="form-control" id="status" placeholder="status" readonly>
							</div>
						</div>
						<div class="form-group"> 
							<label class="col-sm-12 control-label">Delete Recurrence</label>
							<div class="col-sm-12">
								<label onclick="toggleCheck1('check2');" class="label-off" for="check2" id="check2_label">Delete</label>
							</div>
							<input class="nocheckbox" type="checkbox" id="check2" name="delete-repeat">
						</div>
					</div>
					<script>
					function toggleCheck1(check) {
						if ($('#'+check).is(':checked')) {
							$('#'+check+'_label').removeClass('label-on');
							$('#'+check+'_label').addClass('label-off');
						} else {
							$('#'+check+'_label').addClass('label-on');
							$('#'+check+'_label').removeClass('label-off');
						}
					}
					</script>
					<input type="hidden" name="id" class="form-control" id="id">
					<input type="hidden" name="rid" class="form-control" id="rid">
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>

<script>
	$(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next, today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay, listWeek'
			},
			height: 540,
			businessHours: {
			  dow: [ 1, 2, 3, 4, 5 ],
			  start: '8:00',
			  end: '17:00',
			},
			nowIndicator: true,
			now: '2019-01-11T11:15:00', //remove - only for demo
			scrollTime: '08:00:00',
			defaultDate: '2019-01-07', // Use this line to use the current date: new Date(),
			editable: true,
			navLinks: true,
			eventLimit: true, // allow "more" link when there are too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #startDate').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #endDate').val(moment(start).add(2, 'w').format('YYYY-MM-DD'));
				$('#ModalAdd').modal('show');
			},
			eventAfterRender: function(eventObj, $el) {
				var request = new XMLHttpRequest();
				request.open('GET', 'json/events.json', true);
				request.onload = function () {
					$el.popover({
						title: eventObj.title,
						content: eventObj.description,
						trigger: 'hover',
						placement: 'top',
						container: 'body'
					});
				}
			request.send();
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #rid').val(event.rid);
					$('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #end').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #description').val(event.description);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #status').val(event.repeat);
					if (event.repeat == 'yes') {
                        $('#editRepeat').show();
					} else {
                        $('#editRepeat').hide();
					}
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position
				edit(event);
			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
				edit(event);
			},
            events: {
                url: 'php/get-events.php',
                error: function() {
                $('#script-warning').show();
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            }
		});
		function edit(event) {
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if (event.end) {
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			} else {
				end = start;
			}
			id = event.id;
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate-json.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
				 alert('Saved');
				}
			});
		}
	});
</script>

</body>
</html>
