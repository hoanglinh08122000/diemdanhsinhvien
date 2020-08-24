@extends('layouts.master')
@section('content')

{{-- <a href="{{ route('students.view_insert_students') }}">
	Add	

</a> --}}

<table class="table">
	<tr>
		<th >Id</th>
		<th scope="col" style="text-align: center;">Tên</th>
		<th scope="col" style="text-align: center;"> Tuổi</th>
		<th scope="col" style="text-align: center;">Địa chỉ</th>
		<th scope="col" style="text-align: center;">Giới tính</th>
		<th scope="col" style="text-align: center;">Điện thoại</th>
		
		<th scope="col" style="text-align: center;">Email</th>
		<th></th>
		<th></th>

		
		</tr>

		<tbody>


			@foreach ($array_list as $students)
			<tr>
				<th >
					{{$students->id}}
				</td>
				<td>
					{{$students->full_name}}
				</td>
				<td>
				
					{{ $age = date_diff(date_create($students->date), date_create('now'))->y}}
				</td>

				<td>
					{{$students->address}}
				</td>
				<td>
					@php
					if ($students->gender==1){
						echo "boy";
					}else {
						echo "girl";
					}

					@endphp
					
				</td>
				<td>
					{{$students->phone}}
				</td>
				<td>
					{{$students->email}}
				</td>
				
				

			</tr>

			@endforeach
			<br>
	{{-- <input type="search" placeholder="search..." name="search" value="{{ $search }}" style="float:right;border-radius: 10px;">
	<button type="submit"></button> --}}

</tbody>
</table>
{{$array_list->appends(['search' => $search])->links()}}
@endsection