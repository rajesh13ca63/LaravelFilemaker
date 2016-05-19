<?php
/**
*File name: StudentRegistration.
*File type: php.
*Date of  creation:15th May 2016.
*Author: Rajesh Gupta
*Purpose: This is a contrller used for redirecting the corresponding routes.
*Path:E:\xampp\htdocs\laravelfilemaker.
**/
namespace App\Http\Controllers;

use Validater;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
class StudentController extends Controller
{
    /* This Method is used for student Registration */ 
    public function StudentRegistration(Request $request){
        
        $this->validate($request, [
        'rollno' => 'required',
        'name' => 'required',
        'class' => 'required',
        'department' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'mobileno' => 'required'
        ]);
        
        $student = new Student();
        $student->NewStudentRegistration($request);
    
        return redirect('allstudent')->with('Success', 'Data Inserted Successfully');
    }
    
    /* This Method is used for student Update Records */
    public function StudentUpdate(Request $request) {
        $this->validate($request, [
        'rollno' => 'required',
        'name' => 'required',
        'class' => 'required',
        'department' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'mobileno' => 'required'
        ]);
        
        $student = new Student();
        $student->PostUpdateStudentRecords($request);
        
        return redirect('allstudent')->with('Success', 'Data Updated Successfully');
    }
    
    /* This Method is used for Search Student Records */
    public function SearchStudentRecord(Request $requst){
        $student = new Student();
        $student->SearchStudentRecords();
    }
    
    /*This Method is used to Show all student records and search records */
    public function AllStudentInfo(Request $request){
        $order_by_column = 'StudentName';
        $order_by_value = 'asc';
        
        if (isset($request['sort']) && ! empty($request['sort']) ){
            $order_by="";
            foreach($request['sort'] as $key=> $value)
            $order_by_column = $key;
            $order_by_value = $value; 
        }
     
        if (isset($request['searchPhrase']) && ! empty($request['searchPhrase'])) {
            
            $student = new Student();
            $student->SearchAllStudentRecords($request, $order_by_column, $order_by_value);
        } else {
            $student = new Student();
            $student->ShowAllStudentRecords($request, $order_by_column, $order_by_value);
        }
    }
    
    /*Search Student Records Form filemaker database */
    public function SearchStudentList(Request $request) {
        $student = new Student();
        $student->SearchAllStudentRecords($request);
              
    }
    
    /*This is the Method to View Update Form */
    public function GetEditStudentDetails(Request $request) {
        $student = new Student();
        $student->GetEditStudentDetails($request);
             
    }
    
    /* This Method is used to show the student details*/
    public function GetStudentDetails(Request $request) {
        $result = Student::where('RollNo', $request['id'])
                         ->first();
        
        return view('StudentDetails',array('user' => $result));
    }
    
    /* This Method is used for Delete Student Records */
    public function DeleteStudentRecords(Request $request) {
        $student = new Student();
        $res=$student->DeleteStudentRecord($request);
        
        return redirect('allstudent')->with('Success', 'Data Deleted Successfully');
    }
}
