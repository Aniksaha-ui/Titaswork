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
						 
						 <th style="text-align: center;">Model name</th>
						
						  <th style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($product as $product)
						   <tr> 
						   
						    <td style="text-align: center;"><p hidden>{{$product->id}}</p><p><img style="width: 90px; height: 60px; border-radius: 60%" src="{{url($product->p_image)}}"></p><p>{{$product->p_name}}</p></td> 
						   
						    <td style="text-align: center;">{{$product->m_name}}</td> 
						   
						     <td style="text-align: center;">
                          <a href="{{url('/single/cart/')}}/{{$product->id}}/{{'fromsimplecart'}}/{{'0'}}/{{'0'}}" class="btn btn-success">
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