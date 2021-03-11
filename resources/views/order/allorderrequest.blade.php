	@extends("AdminPages.Dashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style="background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">All Active Order</h4>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue;">
						 <thead> 
						 <tr> 
						 <th style="text-align: center;">User Name</th>
						 <th style="text-align: center;">Total Bill</th>  
						 <th style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($ShowAllOrderDetails as $ShowAllOrderDetails)
						   <tr> 
						   <th scope="row" style="text-align: center;">{{$ShowAllOrderDetails->name}}</th> 
						    <td style="text-align: center;"><?php 
						    	if($ShowAllOrderDetails->total_cost>=5000){
						    		echo $ShowAllOrderDetails->total_cost;
						    	}
						    	else{
						    		echo $ShowAllOrderDetails->total_cost + 100;
						    	}

						    ?></td> 
						    <td style="text-align: center;">
                          <a href="{{URL('/viewcartforadminnew/'.$ShowAllOrderDetails->user_id)}}" class="btn btn-success">
                            <span style="width: 100px; height: 10px; color: black; font-size: 12px;" class="glyphicon glyphicon-edit">Show Details</span>  
                          
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