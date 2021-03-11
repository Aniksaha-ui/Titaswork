@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">User Edit</p>
             <form class="form-horizontal" method="POST" action="{{url('/updateUser')}}" enctype="multipart/form-data">
                       {{csrf_field()}} 
                  <div class="form-group" style="margin-left: 200px;margin-left: 100px; padding-top: 30px; padding-bottom: 30px;">

                  </div>
                  @foreach($users as $users)
                    <div class="form-group">
                    <label class="col-md-2 control-label">User Name</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="{{$users->name}}" style="color: black;" class="form-control1" placeholder="Enter User's Name" name="name">
                      </div>
                      <br>
                   </div>
                    </div>




                        <div class="form-group">
                    <label class="col-md-2 control-label">User Email</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="{{$users->email}}" style="color: black;" class="form-control1" placeholder="Enter User's Email" name="email">
                      </div>
                      <br>
                   </div>
                    </div>





                        <div class="form-group">
                    <label class="col-md-2 control-label">User Role</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                      <select name="role" class="form-control" id="role">
                         <option value="">--- Select Role---</option>
                         <option value="admin">Admin</option>
                         <option value="shopper">Shopper</option>
                         <option value="dealer">Dealer</option>
                         <option value= "whole">Whole Seller</option>
                         <option value="manager">Manager</option>
                      </select>
                      </div>
                      <br>
                   </div>
                    </div>



                        <div class="form-group">
                    <label class="col-md-2 control-label">User password</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" value="<?php echo $users->password ?>" style="color: black;" class="form-control1" placeholder="Enter User's Password" name="password">
                      </div>
                      <br>
                   </div>
                    </div>

                    @endforeach



   <button style="margin-left: 400px;" type="submit" class="btn btn-primary">add new Product</button>
                  

                    </div>
                  
                </form>
              </div>
            </div>

@endsection
