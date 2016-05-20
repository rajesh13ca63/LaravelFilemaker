<!------------------------------------------------
/**
*File name: StudentRegistration.
*File type: php.
*Date of  creation:15th May 2016.
*Author: Rajesh Gupta
*Purpose: this php file is used for Show gridList student records.
*Path:E:\xampp\htdocs\filemaker.
**/------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>StudentInfo </title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <!-- Styles -->
        <h2 style="text-align:center">Student Details</h2>
        
       <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css">
	
    </head>
     <div class="container">
      @if(session('Success'))
            <div class="alert alert-success">
                {{session('Success')}}
            </div>
      @endif
      <h4>Add New Student</h4>
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-info btn-md" data-backdrop="static"  data-toggle="modal" data-target="#myModal">Add Student</button>
       
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="modal hide" data-dismiss="modal" data-backdrop="static">&times;</button>
              <h4 class="modal-title">Student Information</h4>
            </div>
            <div class="modal-body">
            <div class="container">
              <div class="row">
              <div class="col-md-6 ">
              
              <div class="row">
                    <div class="col-sm-12" id="errorDiv">
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">Student Details</div>
                      <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="{{url('AddNewStudent')}}">
                          {!! csrf_field() !!}
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Roll No</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="rollno"
                                      placeholder="Roll no">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Full Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="name" 
                                      placeholder="Full name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Class</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="class"
                                      placeholder="Class">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Department</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="department" 
                                     placeholder="Department">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Gender</label>
                                  <div class="col-md-3">
                                      <div class="radio">                       
                                          <input type="radio" name="gender" id="gender" 
                                          value="male">Male
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="radio">
                                         <input type="radio" name="gender" id="gender" 
                                          value="female">Female
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">DOB</label>
                                  <div class="col-md-6">
                                    <input type="date" class="form-control" name="dob" 
                                     placeholder="MM/DD/YYYY">
                                  </div>
                              </div>
          
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Full Address</label>
                                  <div class="col-md-6">
                                    <input type="text"  name="address" class="form-control"
                                     placeholder="Address">
                                  </div>
                              </div>
                                 
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Mobile Number</label>
                                  <div class="col-md-6">
                                      <input type="text"  name="mobileno" class="form-control"
                                      placeholder="Mobile no">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Email Id</label>
                                  <div class="col-md-6">
                                      <input type="text"  name="email"  class="form-control"
                                      placeholder="Email id">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-5">
                                      <button type="submit" name="submitmodel" class="btn btn-primary" 
                                      value="Save">
                                      Save
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
       
    <!-- Table -->
    <table id="gridStudentList" name="gridStudentList" data-toggle="table" class="table table-striped table-bordered dt-responsive nowrap" aria-disabled="true" cellspacing="0" width="100%">
   
      <thead>
      <tr>
        <th data-column-id="RollNo" data-identifier="true" data-type="numeric" data-align="left" >Roll No</th>
        <th data-column-id="StudentName" data-order="asc" data-header-align="left" data-sortable="true">Student Name</th>
        <th data-column-id="Class" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-sortable="true">Class</th>
        <th data-column-id="Department" data-css-class="cell" data-header-css-class="column" data-filterable="true" >Department</th>
        <th data-column-id="Gender" data-header-css-class="column" data-filterable="true">Gender</th>
        <th data-column-id="Dob" data-header-css-class="column" data-filterable="true">DOB</th>
        <th data-column-id="Address" data-header-css-class="column" data-filterable="true">Address</th>
        <th data-column-id="MobileNo" data-header-css-class="column" data-filterable="true">MobileNo</th>
        <th data-column-id="EmailId" data-formatter="column" data-filterable="true">EmailId</th>
        <th data-column-id="commands" data-visibleInSelection="false" data-formatter="commands" data-sortable="false">Actions</th>
      </tr>
      </thead>
      </table>
      
      <!-- javascript -->
      	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js" ></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
        <script src="{{ URL::asset('js/gridStudentList.js?version=1.5') }}"></script>
</html>

  


