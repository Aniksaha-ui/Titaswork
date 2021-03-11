	@extends("AdminPages.Dashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style="background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">User Information</h4>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue;">
						 <thead> 
						 <tr> 
						 <th style="text-align: center;">ID</th>
						 <th style="text-align: center;">User Name</th>
						 <th style="text-align: center;">User Email</th>
						 <th style="text-align: center;">User Role</th>
						 <th style="text-align: center;">Password</th>
						 <th style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($user as $users)
						   <tr> 
						   <th scope="row" style="text-align: center;">{{$users->id}}</th> 
						    <td style="text-align: center;">{{$users->name}}</td>
						    <td style="text-align: center;">{{$users->email}}</td>
						    <td style="text-align: center;">{{$users->role}}</td>
						    <td style="text-align: center;"><?php echo (($users->password)); ?></td>
						    <td style="text-align: center;">
                          <a href="{{URL('users/edit/'.$users->id)}}" class="btn btn-success">
                            <span style="width: 50px; height: 10px; border-radius: 60%; color: black; font-size: 12px;" class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('users/delete/'.$users->id)}}" class="btn btn-danger">
                            <span  style="width: 50px; height: 10px; border-radius: 60%;color: black; px;"  class="glyphicon glyphicon-trash">Del</span>
                            

                          </td>

						
						   
						     </tr> 
						     @endforeach
						   </tbody> 
						</table> 
					</div>



@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection