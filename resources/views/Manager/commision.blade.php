	@extends("Manager.ManagerDashboard")
	@section("form")

	@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

	@endsection
	
	<div class="table-responsive bs-example widget-shadow" style="padding-right:7px;padding-left:7px; padding-bottom: 100px; padding-top: 30px; background-color: #659DBD">
						<h4 style="padding: 20px;text-align: center; color: black; font-family:Franklin Gothic Medium">Commision for manager</h4>
						<table class="table table-bordered" id="datatable" style="background-color: powderblue; ">
						 <thead> 
						 <tr> 
						
						 <th style="text-align: center;">Total Cost</th>
						 <th style="text-align: center;">Commision</th>  
						   </tr> 
						</thead> 
						   <tbody> 
						   @foreach($commisionformanager as $commisionformanager)
						   <tr> 
						
						  <td style="text-align: center;">{{$commisionformanager->totalcost}}</td>  
						    <td style="text-align: center;">{{$commisionformanager->givencommision}}</td>
						    
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