@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style="background-color: #659DBD">
              <div class=" panel-body-inputin">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}} 
                 <div class="form-group">
                    <label class="col-md-2 control-label">Catagory name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter catagory name" name="c_name">
                      </div>
                      <br>
                   </div>

                    </div>


                    <div class="form-group">
                    <label class="col-md-2 control-label">Catagory image</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="file" style="color: black;" class="form-control1" placeholder="Image" name="image">
                      </div>
                      <br>
                   </div>

                    </div>

                  <div class="col text-center">
                  <button type="submit" class="btn btn-primary">add new catagory</button>
                </div>
                </form>
              </div>
            </div>
@endsection