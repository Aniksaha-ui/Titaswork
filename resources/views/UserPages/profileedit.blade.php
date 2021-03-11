@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">profile Change</p>
                 <form method="POST" class="form-horizontal" action="{{url('/updateprofile')}}" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  <div class="form-group" style="margin-left: 200px;margin-left: 100px; padding-top: 30px; padding-bottom: 30px;">

                  </div>

                  @foreach($user as $user)
                   


                        <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$user->name}}" class="form-control1" placeholder="Enter model name" name="name">
                      </div>
                      <br>
                   </div>
                    </div>



                        <div class="form-group">
                    <label class="col-md-2 control-label">User Name(Email)</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$user->email}}" class="form-control1" placeholder="Enter model name" name="email">
                      </div>
                      <br>
                   </div>
                    </div>


                           <div class="form-group">
                    <label class="col-md-2 control-label">password</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="password" style="color: black;" class="form-control1" value="{{$user->password}}" placeholder="Enter Password" name="password">
                      </div>
                      <br>
                   </div>
                    </div>




                        <div class="form-group">
                    <label class="col-md-2 control-label">Phone</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$user->phone}}" class="form-control1" placeholder="Enter Phone Number" name="phone">
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
                        <input type="text" style="color: black;" value="{{$user->address}}" class="form-control1" placeholder="Enter your address" name="address">
                      </div>
                      <br>
                   </div>
                    </div>


                    <div class="form-group">
                    <label class="col-md-2 control-label">City</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" style="color: black;" value="{{$user->city}}" class="form-control1" placeholder="Enter your city" name="city">
                      </div>
                      <br>
                   </div>
                    </div>

                    @endforeach


 <div class="col text-center">
   <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>                 
</div>
                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           