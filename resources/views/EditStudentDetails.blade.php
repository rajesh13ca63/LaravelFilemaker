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
                    <form class="form-horizontal" role="form" method="POST" action="{{url('postupdate')}}">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Roll No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rollno" value="{{$user->RollNo}}"
                                placeholder="Roll no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$user->StudentName}}"
                                placeholder="Full name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Class</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="class" value="{{$user->Class}}"
                                placeholder="Class">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="department" value="{{$user->Department}}"
                               placeholder="Department">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-3">
                                <div class="radio">                       
                                    <input type="radio" name="gender" id="gender" 
                                    value="male" {{ $user->Gender == 'male' ? 'checked="checked"' : ''}}>Male</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                   <input type="radio" name="gender" id="gender" 
                                    value="female" {{ $user->Gender == 'female' ? 'checked="checked"' : ''}}>Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">DOB</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="dob" value="{{$user->Dob}}"
                               placeholder="Date of Birth">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Full Address</label>
                            <div class="col-md-6">
                                <input type="text"  name="address" class="form-control" value="{{$user->Address}}"
                                placeholder="Address">
                            </div>
                        </div>
                           
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input type="text"  name="mobileno" class="form-control" value="{{$user->MobileNo}}"
                                placeholder="Mobile no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email Id</label>
                            <div class="col-md-6">
                                <input type="text"  name="email"  class="form-control" value="{{$user->EmailId}}"
                                placeholder="Email id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" name="submit" class="btn btn-primary" 
                                value="update">
                                Update
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
