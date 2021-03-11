@extends("AdminPages.Dashboard")
@section("form")

<div class="form-three widget-shadow" style=" background-color: #659DBD">
              <div class=" panel-body-inputin">
              <p style="color: black;text-align: center;font-family: Arial;">Search Bills</p>
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
                        <select name="user_id" class="form-control" >
                    <option value="">--- Select user ---</option>
                    @foreach ($users as $users)
                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
                      </div>
                      <br>
                   </div>
                    </div>


                        <div class="form-group">
                    <label class="col-md-2 control-label">Date</label>
                    <div class="col-md-8">
                      <div class="input-group">             
                        <span class="input-group-addon">
                          <i class="fa fa-circle-o"></i>
                        </span>
                      <input type="date" style="color: black;" class="form-control1" placeholder="Enter product name" name="date">
                      </div>
                      <br>
                   </div>
                    </div>


   <div class="container">
          <div class="row">
           <div class="col text-center">
           <button class="btn btn-">Search</button>
         </div>
        </div>
      </div>
                  

                    </div>
                  
                </form>
              </div>
            </div>
@endsection





                           