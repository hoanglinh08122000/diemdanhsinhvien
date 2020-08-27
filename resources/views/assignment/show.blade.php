@extends('layouts.master')
@section('titles', "Danh sách giảng dạy")
@section('content')

<table class="table">
	<tr>
		
		
		<th scope="col">Tên giáo viên</th>
		<th scope="col">Tên môn học </th>
		
		<th scope="col">Tên lớp</th>


		<th></th>
		<th></th>
	</tr>
	<tbody>
		@foreach ($array_list as $assignment)
		<tr>
			
			<td>
				{{$assignment->teacher->full_name}} 
			</td>
			
			<td>
				{{ $assignment->subject	->name }}
			 	
			</td>
			<td>
				{{ $assignment->classs->name }}
			 	
			</td>
			

		</tr>

		@endforeach
		<br>
	</tbody>
</table>

@endsection