@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">New User</p>
                 <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  <div class="form-group" style="margin-left: 200px;margin-left: 100px; padding-top: 30px; padding-bottom: 30px;">

                  </div>
                    <div class="form-group">
                    <label class="col-md-2 control-label">User Name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter User name" name="name">
                      </div>
                      <br>
                   </div>
                    </div>




                        <div class="form-group">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter model name" name="email">
                      </div>
                      <br>
                   </div>
                    </div>








                   



                        <div class="form-group">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="password" style="color: black;" class="form-control1" placeholder="Enter Password" name="password">
                      </div>
                      <br>
                   </div>
                    </div>

                         <div class="form-group">
                    <label class="col-md-2 control-label">phone</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter Password" name="phone">
                      </div>
                      <br>
                   </div>
                    </div>




                         <div class="form-group">
                    <label class="col-md-2 control-label">Address</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter Address" name="address">
                      </div>
                      <br>
                   </div>
                    </div> 




                         <div class="form-group">
                    <label class="col-md-2 control-label">city</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" class="form-control1" placeholder="Enter city name" name="city">
                      </div>
                      <br>
                   </div>
                    </div>





                    <div class="form-group">
                    <label class="col-md-2 control-label">Role</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <select name="role" class="form-control" style="width:640px">
                    <option value="">--- Select Role ---</option>
                   
                    <option value="shopper">Shopper</option>

                    <option value="Dealer">Dealer</option>

                    <option value="whole">Whole Seller</option>
                  
                </select>
                      </div>
                      <br>
                   </div>
                    </div>





                    <div class="form-group">
                    <label class="col-md-2 control-label">Created By</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <select name="user_id" class="form-control" style="width:640px">
                    <option value="">--- Select User ---</option>
                    @foreach ($users as $users)
                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
                      </div>
                      <br>
                   </div>
                    </div>




                  







              





 <div class="col text-center">

   <button style="background-color: powderblue;" type="submit" class="btn btn-">add new User</button>
   </div>               

                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           