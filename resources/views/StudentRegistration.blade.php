<!--
/**
*File name: StudentRegistration.
*File type: php.
*Date of  creation:9th May 2016.
*Author: Rajesh Gupta
*Purpose: this php file is used for student registration.
*Path:E:\xampp\htdocs\filemaker.
**/-->
@extends('layouts.app')
@section('content')
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
        @if(session('Success'))
            <div class="alert alert-success">
                {{session('Success')}}
            </div>
        @endif
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
                               placeholder="Date of Birth">
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
                                <button type="submit" name="submit" class="btn btn-primary" 
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
@endsection
