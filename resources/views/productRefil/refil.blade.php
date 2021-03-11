@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">Product Insert</p>
                 <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  <div class="form-group" style="margin-left: 200px;margin-left: 100px; padding-top: 30px; padding-bottom: 30px;">

                  </div>
                 
                         <div class="form-group">
                    <label class="col-md-2 control-label">Product Name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <select name="product" class="form-control" style="width:640px">
                    <option value="">--- Select Product ---</option>
                    @foreach ($product as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                      </div>
                      <br>
                   </div>
                    </div>





                        <div class="form-group">
                    <label class="col-md-2 control-label">Price</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="" style="color: black;" class="form-control1" placeholder="Enter price" name="price">
                      </div>
                      <br>
                   </div>
                    </div>


                       <div class="form-group">
                    <label class="col-md-2 control-label">Quantity</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="" style="color: black;" class="form-control1" placeholder="Enter Quantity" name="quantity">
                      </div>
                      <br>
                   </div>
                    </div>



                 






   <button style="margin-left: 400px;" type="submit" class="btn btn-">add new Product</button>
                  

                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           