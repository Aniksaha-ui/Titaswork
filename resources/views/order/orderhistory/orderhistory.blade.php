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
						
						 <th style="text-align: center;">Product Name</th>
						 <th style="text-align: center;">Price</th>
						  <th style="text-align: center;">Order Quantity</th> 
						  <th style="text-align: center;">Date</th> 

						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($orderHistory as $orderHistory)
						   <tr> 
						    <td style="text-align: center;">{{$orderHistory->p_name}}</td> 
						     <td style="text-align: center;">{{$orderHistory->product_selling_price}}</td> 
						     <td style="text-align: center;">{{$orderHistory->order_quantity}}</td>
						     <td style="text-align: center;">{{$orderHistory->order_date}}</td>
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