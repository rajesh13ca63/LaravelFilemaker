<?php
/**------------------------------------------------------------------
*File name: StudentRegistration.
*File type: php.
*Date of  creation:12th May 2016.
*Author: Rajesh Gupta
*Purpose: This php file is used for student Related Operation Like Insert , Update , Delete etc.
*Path:E:\xampp\htdocs\laravelfilemaker.
*---------------------------------------------------------------------*/
namespace App;

use filemaker_laravel\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use App\Requests;

class Student extends Model
{
    protected $layoutName = 'UI_StudentDetails';
    protected $primaryKey = 'StudentId_pkn';
    
    /* This Method is used to student registration */
    public function NewStudentRegistration($request)
    {
        /*Insert new Student Records */            
        $student = new Student();
        $student->RollNo = $request['rollno'];
        $student->StudentName = $request['name'];
        $student->Class = $request['class'];
        $student->Department = $request['department'];
        $student->Gender = $request['gender'];
        $student->Dob = $request['dob'];
        $student->Address= $request['address'];
        $student->MobileNo = $request['mobileno'];
        $student->EmailId = $request['email'];
        $student->save();
    }
    
    /* This Method is used for Delete student Records */
    public function DeleteStudentRecord($request) {
        $result = Student::where('RollNo', $request['id'])
                         ->delete();
                         
    }
    
    /* This Method is used to search record for testing purpose */
    public function SearchStudentRecords()
    {
        $test= Student::All();
        dd($test);
       
    }
    
    /* This Method is Fetch the student records and show in update view*/
    public function GetEditStudentDetails($request) {
        
        $result = Student::where('RollNo', $request['id'])
                         ->first();
        
        echo view('EditStudentDetails',array('user' => $result));
    }
    
    /* This Method is used for Update student Records after correction */
    public function PostUpdateStudentRecords($request) {
        
        $students = Student::where('RollNo', '=', $request['rollno'])
                ->update(['RollNo' => $request['rollno'],
                          'StudentName' => $request['name'],
                          'Class' => $request['class'],
                          'Department' => $request['department'],
                          'Gender' => $request['gender'],
                          'Dob' => $request['dob'],
                          'Address' => $request['address'],
                          'MobileNo' => $request['mobileno'],
                          'EmailId' => $request['email']                       
                                                                             
                          ]);
                
    }
    
    /*This Method is used for show all records of student in bootgrid */
    public function ShowAllStudentRecords($request, $order_by_column, $order_by_value)
    {
        $current = $request['current'];
        $row = $request['rowCount'];
       
        $i = 0;
        $results = Student::orderBy($order_by_column, $order_by_value)
                            //->skip($current)->limit($row)->get();
                           ->get();
        foreach($results as $result ) {
        $response[] = $result['attributes'];
        $i++;
        }
       
        $data = array(
            'current' => $current,
            'rowCount' => $i,
            'rows' => $response,
            'total'=> count($results)
        );
        
        echo json_encode($data); 
       
    }
    
    /* This method is used for search student records form database */
    public function SearchAllStudentRecords($request, $order_by_column, $order_by_value) {
        $current = $request['current'];
        $i=0;
        $results= Student::orwhere('Class',  $request['searchPhrase'])
                          ->orwhere('RollNo', $request['searchPhrase'])
                          ->orwhere('StudentName',$request['searchPhrase'])
                          ->orwhere('Department',$request['searchPhrase'])
                          ->orwhere('Gender', $request['searchPhrase'])
                          ->orwhere('Dob', $request['searchPhrase'])
                          ->orwhere('MobileNo', $request['searchPhrase'])
                          ->orwhere('Address', $request['searchPhrase'])
                          ->orwhere('EmailId', $request['searchPhrase'])
                          ->orderBy($order_by_column, $order_by_value)
                          ->get();
                          
        $response = [];
        foreach ($results as $result ) {
            $response[] = $result['attributes'];
            $i++;
        }
 
        $data = array(
            'current' => $current,
            'rowCount' => $i,
            'rows' => $response,
            'total'=> count($results)
        );
        
        echo json_encode($data);
    }
}