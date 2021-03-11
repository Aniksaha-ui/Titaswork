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
                    <label class="col-md-2 control-label">Title</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter product name" name="title">
                      </div>
                      <br>
                   </div>
                    </div>





                         <div class="form-group">
                    <label class="col-md-2 control-label">ComboImage</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="file" class="form-control" id="exampleInputEmail1" placeholder="product price" name="image">
                      </div>
                      <br>
                   </div>
                    </div>





 <div class="col text-center">
   <button type="submit" class="btn btn-primary btn-lg">add new Combo</button>                 
</div>
                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           