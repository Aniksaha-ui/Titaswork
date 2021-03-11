	@extends("UserPages.UserDashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style="padding-right:7px;padding-left:7px; padding-bottom: 100px; padding-top: 30px; background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Product Information</h4>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						
						 <th style="text-align: center;">Product Name</th>
						 <th style="text-align: center;">Discounts(In percentage)</th>
						 <th style="text-align: center;">Discounts (In tk)</th>
						  <th style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($discounted_product as $discounted_product)
						   <tr> 
						  
						    <td style="text-align: center;"><p hidden>{{$discounted_product->id}}</p> <p><img style="width: 90px; height: 60px; border-radius: 60%" src="{{$discounted_product->p_image}}"></p><p>{{$discounted_product->p_name}}</p><p>Model:{{$discounted_product->m_name}}</p></td> 
						   
						
						  <td style="text-align: center;">{{$discounted_product->discount_in_percentage}}</td>  
						    <td style="text-align: center;">{{$discounted_product->discount_in_tk}}</td>
						     <td style="text-align: center;">
                          <a href="{{url('/single/cart/')}}/{{$discounted_product->id}}/{{'fromdiscount'}}/{{$discounted_product->discount_in_percentage}}/{{$discounted_product->discount_in_tk}}" class="btn btn-success">
                            <span style="width: 50px; height: 10px; border-radius: 60%; color: black; font-size: 12px;" class="glyphicon glyphicon-plus">Order</span>
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