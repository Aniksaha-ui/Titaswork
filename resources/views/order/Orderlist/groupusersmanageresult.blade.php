  @extends("AdminPages.Dashboard")
  @section("form")

  @section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

  @endsection
  
  <div class="table-responsive bs-example widget-shadow" style="background-color: #659DBD">
            <h4 style="text-align: center; color: black; font-family:Franklin Gothic Medium">Order Information</h4>

            
              <h4 style="text-align: right; color: black; font-family:Franklin Gothic Medium">Date:{{$date}}</h4>
              <br>
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
               @foreach($order as $order)
               <tr> 
               <th scope="row" style="text-align: center;">{{$order->order_id}}</th> 
                <td style="text-align: center;">{{$order->name}}</td>
                <td style="text-align: center;">{{$order->p_name}}</td>
                <td style="text-align: center;">{{$order->product_selling_price}}</td>
                <td style="text-align: center;">{{$order->order_quantity}}</td>
                <td style="text-align: center;">{{$order->order_date}}</td> 
                <td style="text-align: center;">
                             <a href="{{URL('allorder/edit/'.$order->order_id)}}" class="btn btn-success">
                                <span style="width: 50px; height: 10px; border-radius: 60%; color: black; font-size: 12px;" class="glyphicon glyphicon-edit">Edit</span>  
                                <a href="{{URL('allorder/delete/'.$order->order_id)}}" class="btn btn-danger">
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