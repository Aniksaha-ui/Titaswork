	@extends("Manager.ManagerDashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style=" background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">My clients</h4>


						<!-- <p style="text-align: left; padding:6px; background-color: gray; margin-left: 1100px;"><a href="{{URL('//download')}}">PDF download</a></p><br>
 -->						<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						 	
						 <th class="col-sm-1" style="text-align: center;">UserName</th>
					     <th class="col-sm-1" style="text-align: center;">Email</th>
						 <th class="col-sm-1" style="text-align: center;">password</th>
						 <th class="col-sm-1" style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($userUnderme as $userUnderme)
						   <tr> 
						 	 <td hidden style="text-align: center;">{{$userUnderme->id}}</td>
						     <td style="text-align: center;">{{$userUnderme->name}}</td>
						      <td style="text-align: center;">{{$userUnderme->email}}</td>
						      <td style="text-align: center;">{{$userUnderme->password}}</td>
						    <td style="text-align: center;">
						   <a href="{{URL('users/edit/'.$userUnderme->id)}}" class="btn btn-success">
                            <span  class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('users/delete/'.$userUnderme->id)}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash">Del</span>

                            
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