	@extends("AdminPages.Dashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style="background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Catagory Information &nbsp &nbsp&nbsp </h4>

						<p style="text-align: left; padding:6px; background-color: gray; margin-left: 1100px;"><a href="{{URL('/pdf/download')}}">PDF download</a></p><br>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue;">
						 <thead> 
						 <tr> 
						 <th style="text-align: center;">Order Id</th>
						 <th style="text-align: center;">Product Name</th>
						 <th style="text-align: center;">Product Price</th>
						 <th style="text-align: center;">Order Quantity</th>
						 <th style="text-align: center;">Order Date</th>  
						 <th style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($allorders as $allorders)
						   <tr> 
						   <th scope="row" style="text-align: center;">{{$allorders->order_id}}</th> 
						    <td style="text-align: center;">{{$allorders->p_name}}</td> 
						    <td style="text-align: center;">{{$allorders->product_selling_price}}</td>
						    <td style="text-align: center;">{{$allorders->order_quantity}}</td>
						    <td style="text-align: center;">{{$allorders->order_date}}</td> 
						    <td style="text-align: center;">
                         		 <a href="{{URL('allorder/edit/'.$allorders->order_id)}}" class="btn btn-success">
                            		<span style="width: 50px; height: 10px; border-radius: 60%; color: black; font-size: 12px;" class="glyphicon glyphicon-edit">Edit</span>  
                          		  <a href="{{URL('allorder/delete/'.$allorders->order_id)}}" class="btn btn-danger">
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