@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">Product Insert</p>
                 <form method="POST" action="{{url('/updateOrder')}}" class="form-horizontal" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  @foreach($singleOrderData as $singleOrderData)     
                    
                    
                        <input type="hidden" style="color: black;" value="{{$singleOrderData->order_id}}" class="form-control1" placeholder="Enter product name" name="order_id">
                   
                        <input type="hidden" style="color: black;" value="{{$singleOrderData->order_pid}}" class="form-control1" placeholder="Enter product name" name="order_pid">

                         <input type="hidden" style="color: black;" value="{{$singleOrderData->order_quantity}}" class="form-control1" placeholder="Enter product name" name="order_quantity1">

                    <div class="form-group">
                    <label class="col-md-2 control-label">product Name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" disabled="disabled" style="color: black;" value="{{$singleOrderData->p_name}}" class="form-control1" placeholder="Enter product name" name="p_name">
                      </div>
                      <br>
                   </div>
                    </div>


                     <div class="form-group">
                    <label class="col-md-2 control-label">product Price</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$singleOrderData->product_selling_price}}" class="form-control1" placeholder="Enter product name" name="p_price">
                      </div>
                      <br>
                   </div>
                    </div>


                        <div class="form-group">
                    <label class="col-md-2 control-label">Order Quantity</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$singleOrderData->order_quantity}}" class="form-control1" placeholder="Enter product name" name="quantity">
                      </div>
                      <br>
                   </div>
                    </div>

                       <div class="form-group">
                    <label class="col-md-2 control-label">Order Date</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$singleOrderData->order_date}}" class="form-control1" placeholder="Enter product name" name="order_date">
                      </div>
                      <br>
                   </div>
                    </div>


                    @endforeach

   <button style="margin-left: 400px;" type="submit" class="btn btn-">add new Product</button>
                  

                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           