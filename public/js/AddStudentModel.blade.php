@extends('layouts.app')
@section('content')
<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Student</h4>
                </div>
	            <div class="modal-body">
	               <p id ="addnew"></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection
