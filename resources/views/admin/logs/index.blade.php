@extends('admin.layouts.app') <!--, [$pageInfo]-->
@section('main.content')
<style>
table#logs {
    font-size: 14px;
}
	
table#logs td {
    vertical-align: top;
}	
	
</style>
<div class="card-body">

<div class="table-responsive">

	<table id="all-logs" class="display" style="width:100%">
        <thead>
            <tr>
				<th>SR No</th>
				<th>Admin</th>
				<th>Discription</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
			
			@php
			$x = 1;
			@endphp
			@foreach($logs as $data)
				@php
					$admin_user = DB::table('admins')->where('id', $data->admin_id)->first();
				@endphp
				<tr>
				<td>{{$x++}}</td>
				<td>
					{{$admin_user->name}}
				</td>
				<td>
					{{$data->description}} 
				</td>
                <td>
					{{$data->created_at}} 
				</td>
			@endforeach
        </tbody>
    </table>
	</div>
	 </div>  
  </div>

@endsection

