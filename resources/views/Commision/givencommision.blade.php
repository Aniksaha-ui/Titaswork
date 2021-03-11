@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">User Edit</p>
             <form class="form-horizontal" method="POST" action="{{url('/addcommision')}}" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  <div class="form-group" style="margin-left: 200px;margin-left: 100px; padding-top: 30px; padding-bottom: 30px;">

                  </div>
               
                    <div class="form-group">
                    <label class="col-md-2 control-label">Total Cost</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="{{$totalorder}}" id="totalorder" style="color: black;" class="form-control1" placeholder="Enter TotalOrder" name="totalorder">
                      </div>
                      <br>
                   </div>
                    </div>




                        <div class="form-group">
                    <label class="col-md-2 control-label">Given Commision</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="" style="color: black;" id="givencommision" class="form-control1" placeholder="Enter Given Commision" name="commision">
                      </div>
                      <br>
                   </div>
                    </div>








                        <div class="form-group">
                    <label class="col-md-2 control-label">Commision Amount</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="" style="color: black;" id="output" class="form-control1" placeholder="Enter User's Password" name="commisionamount">
                      </div>
                      <br>
                   </div>
                    </div>



   <button style="margin-left: 400px;" type="submit" class="btn btn-primary">add new Product</button>
                  

                    </div>
                  
                </form>
              </div>
            </div>



            <script type="text/javascript">
           $("#totalorder,#givencommision").keyup(function () {
    $('#output').val(($('#totalorder').val() * $('#givencommision').val())/100);
        });

            </script>

@endsection
