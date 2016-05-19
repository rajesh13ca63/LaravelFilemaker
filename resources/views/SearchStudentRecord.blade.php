<!--
/**
*File name: StudentRegistration.
*File type: php.
*Date of  creation:12th May 2016.
*Author: Rajesh Gupta
*Purpose: this php file is used for search student records.
*Path:E:\xampp\htdocs\filemaker.
**/-->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-5 col-sm-offset-4">
        <h2>Search Record</h2>
        <form role="form" name="fm" method="POST" action="{{url('postsearch')}}">
         {!! csrf_field() !!}
            <div class="form-group">
                <label for="search">Search Fields</label>
                <input type="text" name="search" id="search" size="40" placeholder="Search">
            </div>
            <div class="row">
            <div class="col-sm-4">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">
            Search</button>
            </div>
            <div class="col-sm-4">
            <button type="submit" class="btn btn-primary" name="submit" 
            value="All">All</button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
