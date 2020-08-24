@extends('layouts.master')
@section('titles',"Phân công theo lớp")
@section('content')

<div class="card"  >
	
	<div class="card-body card-block" >
		<form action="{{ route('assignment.process_assignment_teacher') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			@csrf
	 		<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Khóa</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="select_course">
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
				<div class="col col-md-3"><label for="select" class=" form-control-label">Lớp</label></div>
				<div class="col-12 col-md-9">
					<select name="id_class" class="form-control" id="select_class">
						{{-- <option disabled selected> Chọn lớp</option>}
						@foreach ($classs  as $class)
						<option value="{{ $class->id }}">
							{{ $class->full_name }}
						</option>
						@endforeach --}}
					</select>
				</div>

			</div>
			
			<br>

			<table class="table">
				<tr>
					<td>Môn</td>
					<td>Giáo viên</td>
					<td>Tình trạng</td>
				</tr>
				<tbody>
					<tr>
						<td name="select_class_td"></td>
						<td name="select_class_td"></td>
						<td name="select_class_td"></td>
						
					</tr>
				</tbody>
			</table>
			<button type="submit" class="btn btn-primary btn-sm" >
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>

		</form>
	</div>
		
	</div>
	

	@endsection

	@push('js')
	<script>
		$(document).ready(function() {
			$("#select_course").change(function(){
				var id = $(this).val();
				$("#select_class").html('');
				$.ajax({
					url: '{{ route('ajax.assignment_class') }}',
					type: 'GET',
					dataType: 'json',
					data: {id : id},
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
	<script>
		$(document).ready(function() {
			$("#select_class").change(function(){
				var id = $(this).val();
				$("#select_class_td").html('');
				$.ajax({
					url: '{{ route('ajax.assignment_class_td') }}',
					type: 'GET',
					dataType: 'json',
					data: {id : id},
				})
				.done(function(response) {
					$(response).each(function()
					{

						$("#select_class_td").append(`

								
							`)
					})
				})
				.fail(function() { 
					alert("sai roi")
				})



			})
		});
	</script>

	@endpush
