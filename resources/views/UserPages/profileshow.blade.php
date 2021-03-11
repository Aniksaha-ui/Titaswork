	@extends("UserPages.UserDashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style=" background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Product Information</h4>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						 <th class="col-sm-1" style="text-align: center;">Name</th>
					     <th class="col-sm-1" style="text-align: center;">User name</th>
					
						 <th class="col-sm-1" style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($user as $user)
						   <tr> 
						   
						    <!-- <th  style="text-align: center;"><p hidden>{{$user->id}}</p></td>  -->
						     <td style="text-align: center;">{{$user->name}}</td>
						      <td style="text-align: center;">{{$user->email}}</td>
						    <td style="text-align: center;">

                          <a href="{{URL('profile/edit/'.$user->u_id)}}" class="btn btn-success">
                            <span  class="glyphicon glyphicon-edit">Edit</span> 

                            
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