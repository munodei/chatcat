<!doctype html>
<html lang="en">
<head>
<title>{{ get_option('site_title') }} | Your Notes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
<link rel="stylesheet" href="{{ url('/') }}/assets/css/colors/blue.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
a:hover, a:visited, a:link, a:active {

    text-decoration: none!important;

    -webkit-box-shadow: none!important;
    box-shadow: none!important;
}
</style>
</head>
<body class="gray">
<style>a {text-decoration: none;} </style>
<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@include('includes.header')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>

				<!-- Navigation -->
        <div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						@include('sidebar.start')
						@include('sidebar.account')

					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Manage Notes</h3>



				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li>Manage Notes</li>
					</ul>
				</nav>
			</div>


 @include('includes.messages')
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12 col-md-12">





							<!-- Tabs Container -->
							<div class="tabs">
								<div class="tabs-header">
									<ul>
										<li class=""><a href="#tab-1" data-tab-id="1" data-toggle="modal" data-target="#exampleModal">Add Group Note</a></li>
										<li class=""><a href="#tab-2" data-tab-id="2">Note Groups</a></li>
										<li class="active"><a href="#tab-3" data-tab-id="3">Notes</a></li>
									</ul>
									<div class="tab-hover" style="left: 179.75px; width: 89.875px;"></div>
									<nav class="tabs-nav">
										<span class="tab-prev"><i class="icon-material-outline-keyboard-arrow-left"></i></span>
										<span class="tab-next"><i class="icon-material-outline-keyboard-arrow-right"></i></span>
									</nav>
								</div>
								<!-- Tab Content -->
								<div class="tabs-content" style="height: 309px;">
									<div class="tab" data-tab-id="1" style="opacity: 1; display: none;">
										<p>Add a new 'Note Group' to your existing Group Notes By Clicking <span style="color;red;"><a href="#"  data-toggle="modal" data-target="#exampleModal">'Add Group Note'</a></span> Above!</p>
									</div>
									<div class="tab" data-tab-id="2" style="display: none; opacity: 1;">
										<?php $y=0; ?>
                  @foreach($group_notes as $key=>$group)
                  @if($y%3==0)
                  <div class="row">
                     @endif
                         <ul class="list-group col-md-3 col-xl-3 group_container"    id="group_{{ $group->id }}" >
                            <li class="list-group-item active" title="{{ $group->group_descripltion }}" style="background-color:rgb(42, 65, 232);line-height:1.5;">
                              <table class="basic-table">
                                <tr >
                                  <td style="width:98%;" data-toggle="modal" data-target="#groupUrlsModal{{ $group->id }}"><span style="color:rgb(42, 65, 232);"><?=$group->group_notes_name?></span></td>
                                  <td data-label="Column 1">
                                    <a href="#" style="width:1%;" title="Edit" data-toggle="modal" data-target="#groupEditModal{{ $group->id }}" class="text-success mr-2 pull-right offset-md-8">
                                                        <i class="icon-feather-edit-2"></i>
                                            </a>
                                    <a href="#" style="width:1%;" style="color:red;"  data-toggle="modal" data-target="#groupModal{{ $group->id }}"class="pull-right offset-md-8" title="delete">
                                      <i style="color:red;" class="icon-material-outline-delete"></i>
                                    </a>
                                  </td>
                                </tr>
                              </table>
                            </li>
                      </ul>
											&nbsp;

                      <?php  $y++;?>
                      @if(sizeof($group_notes)==$y || $y%3==0)
                      </div>
                      <br>
                      <div style="clear:both"></div>
                      @endif
                  @endforeach




									</div>
									<div class="tab active" data-tab-id="3" style="display: block; opacity: 1;">
										<?php $x=0; ?>


	                    @foreach($group_notes as $group)
	                        @if($x%3==0)
	                        <div class="row">
	                       @endif
	                         <ul class="list-group col-md-3 col-xl-3" >
	                            <li class="list-group-item active" title="{{ $group->group_descripltion }}" style="background-color:rgb(42, 65, 232);">
	                              <table>
	                                <tr>
	                                  <td>{{ $group->group_notes_name}}</d>
	                                </tr>
	                              </table>
	                          </li>


	                                  @foreach($notes as $note)

	                                  @if($group->id===$note->group_notes_id)

	                                    <li class="list-group-item"  title="{{ $note->note_descripltion }}">
										<div style="word-wrap: break-word;">
	                                      <table class="basic-table" style="word-wrap: break-word;">
	                                        <tr>
	                                          <td style="width:98%;" style="word-wrap: break-word;"><a href="#" data-toggle="modal" data-target="#ThisNoteModal{{ $note->noteId }}" ><b><?=$note->note_name?></b><br><p style="word-wrap: break-word;">{!! str_limit($note->note,50) !!}</p></a></td>
	                                          <td>
	                                            <a href="#" style="width:1%;display:inline;" title="Edit Note <?=$note->note_name?>" data-toggle="modal" data-target="#editNoteModal{{ $note->noteId }}" class="text-success mr-2 pull-right offset-md-7">
	                                                                <i class="icon-feather-edit-2"></i>
	                                                    </a>
	                                            <a href="#" style="width:1%;display:inline;" title="Delete Note <?=$note->note_name?>" class="pull-right offset-md-7" data-toggle="modal" data-target="#NoteDeleteModal{{ $note->noteId }}" style="color:red;"> <i style="color:red;"class="icon-material-outline-delete"></i></a>
	                                          </td>
	                                        </tr>
	                                      </table>
										  </div>
	                                      </li>

	                                      	<li class="list-group-item"><span class="badge badge-warning"><?php echo $note->priority==0||$note->priority==1?'high priority':''; ?><?php echo $note->priority==2?'medium priority':''; ?><?php echo $note->priority==3?'low priority':''; ?></span></li>


	                                      @endif

	                                  @endforeach



	                                  <li class="list-group-item"><a href="#" title="Add Note in Group {{ $group->group_notes_name}}" data-toggle="modal" data-target="#NoteAddModal{{ $group->id }}"><span class="badge badge-success">Add Note</span></a></li>



	                              </ul>
																&nbsp;
	                                <?php  $x++;?>
	                                @if(sizeof($group_notes)==$x || $x%3==0)
	                                </div>
	                                <br>
	                                <div style="clear:both"></div>
	                                @endif
	                          @endforeach




								</div>
							</div>
							<!-- Tabs Container / End -->
						</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>

			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
</div>
</div>
<!-- Wrapper / End -->




  @foreach($group_notes as $key=>$group)

<!-- Modal -->
<div class="modal fade" id="groupModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="groupModal{{ $group->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
				<h5 class="modal-title" id="exampleModalLabel">Delete Group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			Are you sure you want to delete group '{{ $group->group_notes_name}}' ?
			</div>
			<form name="formGroupDelete{{ $group->id }}" id="formGroupDelete{{ $group->id }}" method="POST" action="{{ route('group-note-destroy') }}">
				{!! csrf_field() !!}
				<input type="hidden" name="id" id="id" value="{{ $group->id }}">
			</form>
			</form>
			<div class="modal-footer">
				<button type="button" onclick="event.preventDefault();document.getElementById('formGroupDelete{{ $group->id }}').submit();" class="btn btn-danger">Delete Group</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of add group modal -->

<!-- Modal -->
<div class="modal fade" id="groupEditModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="groupEditModal{{ $group->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;" >
				<h5 class="modal-title" id="exampleModalLabel">Edit Group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('group-note-update') }}" method="POST" name="formGroupEdit{{ $group->id }}" id="formGroupEdit{{ $group->id }}" autocomplete="OFF">
					{!! csrf_field() !!}
					<input type="hidden" id="id" name="id" value="{{ $group->id }}"/>

						<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Group</label>
								<div class="col-sm-10">
										<input type="text" required name="group_notes_name" class="form-control" id="group_notes_name"  value="{{ $group->group_notes_name}}">
								</div>
						</div>
						<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Info</label>
								<div class="col-sm-10">
										<textarea  required name="group_notes_descripition" id="group_notes_descripition" class="form-control" id="group_description">{{ $group->group_descripltion }}</textarea>
								</div>
						</div>
					</form>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="event.preventDefault();document.getElementById('formGroupEdit{{ $group->id }}').submit();" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of add group modal -->

<!-- Modal -->
<div class="modal fade" id="groupUrlsModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="groupUrlsModal{{ $group->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
				<h5 class="modal-title" id="exampleModalLabel">{{ $group->group_notes_name}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@foreach($notes as $note)

				@if($group->id===$note->group_notes_id)

					<li class="list-group-item" title="{{ $note->note_descripltion }}">
						<table>
							<tr>
								<td style="width:98%;"><b><?=$note->note_name?></b><br><p>{{ $note->note_descripltion }}</p></td>
								<td>
									<a href="#" style="width:1%" title="Edit Note <?=$note->note_name?>" data-toggle="modal" data-target="#id{{ $note->noteId }}" class="text-success mr-2 pull-right offset-md-7">
																			<i class="icon-feather-edit-2"></i>
													</a>
									<a href="#" style="width:1%;" title="Delete Note <?=$note->note_name?>" class="pull-right offset-md-7" data-toggle="modal" data-target="#NoteDeleteModal{{ $note->noteId }}" style="color:red;"><i style="color:red;" class="icon-material-outline-delete"></i></a>
								</td>
							</tr>

						</table>
						</li>
						@endif
				@endforeach
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of add group modal -->

@endforeach

 @foreach($group_notes as $group)
@foreach($notes as $note)
	@if($group->id===$note->group_notes_id)
	<!-- Delete Modal Note -->
  <div class="modal fade" id="NoteDeleteModal{{ $note->noteId }}" tabindex="-1" role="dialog" aria-labelledby="NoteDeleteModal{{ $note->noteId }}Label" aria-hidden="true">
 	 <div class="modal-dialog" role="document">
 		 <div class="modal-content">
 			 <div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
 				 <h5 class="modal-title" id="exampleModalLabel">Delete Note</h5>
 				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					 <span aria-hidden="true">&times;</span>
 				 </button>
 			 </div>
 			 <div class="modal-body">
 			 Are you sure you want to delete the Note '<?=$note->note_name?>'?

 			 <form method="POST" action="{{ route('note-destroy',['id'=>$note->noteId]) }}" name="formNoteDelete{{ $note->noteId }}" id="formNoteDelete{{ $note->noteId }}">
 				 {!! csrf_field() !!}
 				 <input type="hidden" name="id" id="id" value="{{ $note->noteId }}"/>
 			 </form>
 			 </div>
 			 <div class="modal-footer">
 				 <button type="button" onclick="event.preventDefault();document.getElementById('formNoteDelete{{ $note->noteId }}').submit();" class="btn btn-danger">Delete Note</button>
 				 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

 			 </div>
 		 </div>
 	 </div>
  </div>
  <!-- end of delete Note modal -->

  <!-- Add Modal Note -->
  <div class="modal fade" id="editNoteModal{{ $note->noteId }}" tabindex="-1" role="dialog" aria-labelledby="editNoteModal{{ $note->noteId }}Label" aria-hidden="true">
 	 <div class="modal-dialog" role="document">
 		 <div class="modal-content">
 			 <div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
 				 <h5 class="modal-title" id="editNoteModal{{ $note->noteId }}">Edit Note</h5>
 				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					 <span aria-hidden="true">&times;</span>
 				 </button>
 			 </div>
 			 <div class="modal-body">
 				 <form action="{{ route('note-update') }}" method="POST" name="formNoteEdit{{ $note->noteId }}" id="formNoteEdit{{ $note->noteId }}" autocomplete="OFF">
 					 {!! csrf_field() !!}
           <input type="hidden"name="id" value="{{ $note->noteId }}"/>
					 <select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Group" name="group_note_id">
 					@if(isset($group_notes))
 						@foreach($group_notes as $group_note)
 							<option @if($group_note->id==$note->group_notes_id) selected @endif value="{{ $group_note->id }}">{{ $group_note->group_notes_name}}</option>
 						@endforeach
 					@endif
 					</select>

 					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority" name="priority">
 						<option @if($note->priority==3) selected @endif value="3">Low Priority</option>
 						<option @if($note->priority==2) selected @endif value="2">Medium Priority</option>
 						<option @if($note->priority==1 || $note->priority==0) selected @endif value="1">High Priority</option>
 					</select>

 					<input type="text" name="note_title" placeholder="Title" class="with-border" value="<?=$note->note_name?>"/>
 					<textarea  cols="10" placeholder="Note" class="with-border" name="note1">{!! $note->note !!}</textarea>
					<br>
 					<input type="text" name="note_descripition"placeholder="Note Description/Hint" class="with-border" value="{{ $note->note_descripltion }}"/>


 					 </form>
 			 </div>

 			 <div class="modal-footer">
 				 <button type="button" class="btn btn-success" onclick="event.preventDefault();document.getElementById('formNoteEdit{{ $note->noteId }}').submit();">Edit Note</button>
 				 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 			 </div>

 		 </div>
 	 </div>
  </div>
  <!-- end of add Note modal -->

	@endif
@endforeach

<!-- Add Modal Note -->
<div class="modal fade" id="NoteAddModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="NoteAddModal{{ $group->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
				<h5 class="modal-title" id="NoteAddModal{{ $group->group_notesId }}Label">Add New Note</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('note-create') }}" method="POST" name="formNoteCreate{{ $group->id }}" id="formNoteCreate{{ $group->id }}" autocomplete="OFF">
					{!! csrf_field() !!}

						<input type="hidden" name="group_note_id" id="group_note_id" value="{{ $group->id }}">


						<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority" name="priority">
							<option value="3">Low Priority</option>
							<option value="2">Medium Priority</option>
							<option value="1">High Priority</option>
						</select>

						<input type="text" name="note_title" placeholder="Title" class="with-border"/>
						<textarea  cols="10" placeholder="Note" class="with-border" name="note1"></textarea>
						<br>
						<input type="text" name="note_descripition"placeholder="Note Description/Hint" class="with-border"/>

					</form>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="event.preventDefault();document.getElementById('formNoteCreate{{ $group->id }}').submit();" class="btn btn-primary">Add Note</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of add Note modal -->

@endforeach


<!-- Add Group Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:rgb(42, 65, 232);line-height:1.5;">
				<h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('group-note-create') }}" method="POST" name="formGroupAdd" id="formGroupAdd" autocomplete="OFF">
					{!! csrf_field() !!}
						<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Group</label>
								<div class="col-sm-10">
										<input type="text" required name="group_notes_name" class="form-control" id="group_notes_name"  value="">
								</div>
						</div>

						<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Info</label>
								<div class="col-sm-10">
										<textarea  required name="group_notes_descripition" id="group_notes_descripition" class="form-control" id="group_description"></textarea>
								</div>
						</div>

					</form>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="event.preventDefault();document.getElementById('formGroupAdd').submit();" class="btn btn-success">Add Group</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of add group modal -->
@foreach($notes as $note)


<!-- Delete Modal Note -->
<div class="modal fade" id="ThisNoteModal{{ $note->noteId }}" tabindex="-1" role="dialog" aria-labelledby="ThisNoteModal{{ $note->noteId }}Label" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header" style="background-color:rgb(42, 65, 232);">
       <h5 class="modal-title" id="exampleModalLabel"><?=$note->note_name?></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
     {!! $note->note !!}
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
<!-- end of delete Note modal -->

@endforeach




<!-- Scripts
================================================== -->
<script src="{{ url('/') }}/assets/js/jquery-3.3.1.min.js"></script>
<script src="{{ url('/') }}/assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="{{ url('/') }}/assets/js/mmenu.min.js"></script>
<script src="{{ url('/') }}/assets/js/tippy.all.min.js"></script>
<script src="{{ url('/') }}/assets/js/simplebar.min.js"></script>
<script src="{{ url('/') }}/assets/js/bootstrap-slider.min.js"></script>
<script src="{{ url('/') }}/assets/js/bootstrap-select.min.js"></script>
<script src="{{ url('/') }}/assets/js/snackbar.js"></script>
<script src="{{ url('/') }}/assets/js/clipboard.min.js"></script>
<script src="{{ url('/') }}/assets/js/counterup.min.js"></script>
<script src="{{ url('/') }}/assets/js/magnific-popup.min.js"></script>
<script src="{{ url('/') }}/assets/js/slick.min.js"></script>
<script src="{{ url('/') }}/assets/js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() {
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	});
});
</script>

</body>
</html>
