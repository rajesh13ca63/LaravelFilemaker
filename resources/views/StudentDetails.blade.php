<!--/**
*File name: StudentDetails.
*File type: php.
*Date of  creation:6th May 2016.
*Author: Rajesh Gupta
*Purpose: This php file is show the Student details from the database.
*Path:E:\xampp\htdocs\filemaker.
**/-->

@extends('layouts.app')
@section('content')
<!--HTML Code to Display Student Details-->
<div class="container">
    <h2 class="well"  align="center">Student Details</h2>
        <div class="col-lg-12 well">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Roll No:</label>
                        {{$user->RollNo}}
                    </div>								
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Full Name:</label>
                        {{$user->StudentName}}
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Gender:</label>
                        {{$user->Gender}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Class:</label>
                        {{$user->Class}}
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Department:</label>
                        {{$user->Department}}
                    </div>
                </div>		
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Address:</label>
                        {{$user->Address}}
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Mobile No:</label>
                        {{$user->MobileNo}}
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-8 form-group">
                        <label>Email Id:</label>
                        {{$user->EmailId}}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection