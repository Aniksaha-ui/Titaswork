@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;font-style: bold;">Add New discount</p>
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
                        <select name="p_id" class="form-control" style="width:640px">
                    <option value="">--- Select Product ---</option>
                    @foreach ($product as $product)
                    <option value="{{ $product->id }}">{{ $product->p_name }}</option>
                    @endforeach
                </select>
                      </div>
                      <br>
                   </div>
                    </div>


           <div class="form-group">
                    <label class="col-md-2 control-label">Product Quantity</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                       <input type="text" style="color: black;" class="form-control1" placeholder="Enter Discount Amount" name="discounted_quantity">
                      </div>
                      <br>
                   </div>
                    </div>


                        <div class="form-group">
                    <label class="col-md-2 control-label">Discount(tk)</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter Discount Amount" name="discount_in_tk">
                      </div>
                      <br>
                   </div>
                    </div>


                        <div class="form-group">
                    <label class="col-md-2 control-label">Discount(percentage)</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter Discount Amount" name="discount_in_percentage">
                      </div>
                      <br>
                   </div>
                    </div>


            <div class="col text-center">
            <button type="submit" class="btn btn-primary">add new Offer</button>
            </div>               

                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           