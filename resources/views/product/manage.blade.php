	@extends("AdminPages.Dashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style=" background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Product Information  </h4>


						<!-- <p style="text-align: left; padding:6px; background-color: gray; margin-left: 1100px;"><a href="{{URL('//download')}}">PDF download</a></p><br>
 -->						<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						 <th class="col-sm-1" style="text-align: center;">Product Name</th>
					     <th class="col-sm-1" style="text-align: center;">Product Quantity</th>
						 <th class="col-sm-1" style="text-align: center;">Product Price</th>
						 <th class="col-sm-1" style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($product as $product)
						   <tr> 
						   
						    <td  style="text-align: center;"><p hidden>{{$product->id}}</p><p><img style="width: 90px; height: 60px; border-radius: 60%" src="{{$product->p_image}}"></p><p>{{$product->p_name}}</p><p>catagory:{{$product->c_name}}</p><p>Model:{{$product->m_name}}</p></td> 
						     <td style="text-align: center;">{{$product->p_quan}}</td>
						      <td style="text-align: center;">{{$product->p_price}}</td>
						    <td style="text-align: center;">

                          <a href="{{URL('product/edit/'.$product->id)}}" class="btn btn-success">
                            <span  class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('product/delete/'.$product->id)}}" class="btn btn-danger">
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