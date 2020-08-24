@extends('layouts.master')
@section('titles',"Thông tin User")
@section('content')
	<table class="table table-bordered">

		<tr>
			<th>Tên</th>
			<td>{{ $teacher->full_name }}</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>{{ $teacher->date }}</td>
		</tr>
		<tr>
			<th>Tuổi</th>
			<td>
				
				{{ $age = date_diff(date_create($teacher->date), date_create('now'))->y}}
			</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $teacher->email }}</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>{{ $teacher->address }}</td>
		</tr>
		<tr>
			<th>Password</th>
			<td>
				<button id="edit-post" data-id="{{ $teacher->id }}" class="btn btn-success"> Update</button>
			</td>
		</tr>
		
		
	</table>
	<div style="display: none;">
		<form action="" method="get" accept-charset="utf-8">
			
			Password <input type="password" name="password" value="">
			<br>
			New Password <input type="pasword" name="password" value="">
			<br>
			<button class="btn btn-success" type="submit"> Save</button>
		</form>
	</div>	
@endsection
	

@push('js')
{{-- <script type="text/javascript" >
	jQuery(document).ready(function($) {
		$('body').on('click()','#edit-post', function(){
			
		}
		
		



		
	});

</script>  --}}
@endpush
