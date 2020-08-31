@extends('layouts.master')
@section('titles',"Phân công theo giáo viên")
@section('content')

<div class="card"  >
	
	<div class="card-body card-block" >
		<form action="{{ route('assignment.process_assignment_teacher') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			@csrf
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Khóa</label></div>
				<div class="col-12 col-md-9">
					<select name="id_course" class="form-control" id="select_course">
						<option disabled selected> Chọn khóa</option>}
						@foreach ($courses  as $course)
						<option value="{{ $course->id }}">
							{{ $course->name }}
						</option>
						@endforeach
					</select>
				</div>

			</div>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Ngành</label></div>
				<div class="col-12 col-md-9">
					<select name="id_discipline" class="form-control" id="select_discipline">
						<option disabled selected> Chọn ngành</option>}
						
						@foreach ($disciplines  as $discipline)
						<option value="{{ $discipline->id }}">
							{{ $discipline->name }}
						</option>
						@endforeach
					</select>
				</div>

			</div>

			<div class="row form-group">
			<div class="col col-md-3"><label for="select" class=" form-control-label">Lớp</label></div>
				<div class="col-12 col-md-9">
				<select name="id_class" class="form-control select2" id="select_class" required="">
						
					</select>
				</div>

			</div>
			

			<div class="row form-group">
				<div class="col col-md-3" style="margin: auto;"><label for="select" class=" form-control-label">Giáo viên</label></div>
				<div class="col-12 col-md-9">
					<select name="id_teacher" class="form-control" id="select_teacher">
						<option disabled selected> Chọn giáo viên </option>}
						@foreach ($teachers  as $teacher)
						<option value="{{ $teacher->id }}">
							{{ $teacher->full_name }}
						</option>
						@endforeach
					</select>
				</div>

			</div>
		</td>
		
		<div class="row form-group">
			<div class="col col-md-3" ><label for="select" class=" form-control-label">   Môn dạy</label></div>
			<div class="col-12 col-md-9">
				<select class="form-control" name="id_subject" id="select_subject_teacher" required="">
					
				</select>
			</div>

		</div>


			<div style="margin: auto; width: 100%">
				<button type="submit" class="btn btn-primary btn-sm" >
					<i class="fa fa-dot-circle-o"></i> Submit
				</button>
				<button type="reset" class="btn btn-danger btn-sm">
					<i class="fa fa-ban"></i> Reset
				</button>
			</div>
		</form>
	</div>

</div>


@endsection

@push('js')
<script type="text/javascript" >
	jQuery(document).ready(function($) {
		$("#select_discipline").change(function(){
			var id_discipline = $(this).val();
			$("#select_class").html('');
			$.ajax({
				url: '{{ route('ajax.assignment_teacher') }}',
				type: 'GET',
				dataType: 'json',
				data: {id_discipline : id_discipline,id_course:$('#select_course').val()},
			})

			.done(function(response) {
				$(response).each(function()
				{
					

					$("#select_class").append(`
						<option value='${this.id}'>
						${this.name}
						</option>`)
				})
			})
			.fail(function() { 
				alert("sai roi")
			})
		})
	});
</script>
<script type="text/javascript" >
	jQuery(document).ready(function($) {
		$("#select_teacher").change(function(){
			var id = $(this).val();
			$("#select_subject_teacher").html('');
			$.ajax({
				url: '{{ route('ajax.subject_teacher') }}',
				type: 'GET',
				dataType: 'json',
				data: {id : id},
			})
			.done(function(response) {
				$("#select_subject_teacher").append(`
						<option >
						Chọn môn
						</option>`)
				
				$(response).each(function()
				{

					$("#select_subject_teacher").append(`
						<option value='${this.id}'>
						${this.name}
						</option>`)
				})
			})
			.fail(function() { 
				alert("sai roi")
			})

		})
	});

</script>

@endpush





