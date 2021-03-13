	@extends("AdminPages.Dashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style=" background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Product Information  </h4>


						<!-- <p style="text-align: left; padding:6px; background-color: gray; margin-left: 1100px;"><a href="{{URL('//download')}}">PDF download</a></p><br>
 -->					<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						 <th class="col-sm-1" style="text-align: center;">user id</th>
					     <th class="col-sm-1" style="text-align: center;">user name</th>
						 <th class="col-sm-1" style="text-align: center;">Amount</th>
						 <th class="col-sm-1" style="text-align: center;">Action</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($searchresult as $searchresult)
						   <tr> 
						   
						    <td  style="text-align: center;">{{$searchresult->o_user_id}}</td> 
						     <td style="text-align: center;">{{$searchresult->name}}</td>
						      <td style="text-align: center;">{{$searchresult->orderamount}}</td>
						    <td style="text-align: center;">

                          <a href="{{URL('/orderresultshowdetails/'.$searchresult->o_user_id)}}" class="btn btn-success">
                            <span  class="glyphicon glyphicon-edit">Show Details</span>  
                          
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