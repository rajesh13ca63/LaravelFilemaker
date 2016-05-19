<?php
/**--------------------------------------------------------------------------------
*File name: StudentRegistration.
*File type: php.
*Date of  creation:19th May 2016.
*Author: Rajesh Gupta
*Purpose: This is a contrller used for Login Infromation of the corresponding routes.
*Path:E:\xampp\htdocs\laravelfilemaker.
*-----------------------------------------------------------------------------------*/
namespace App\Http\Controllers;

use Validater;
use App\Login;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
class LoginController extends Controller
{
    
    
    /* This Method is used for New User Registration */
    public function NewUserRegistration(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'password_confirmation' => 'required'
        ]);
        
        $user = new Login();
        $user->UserRegistration($request);
        
        return redirect('/')->with('Success', 'You have successfully register');
    }
    
    /* This Method is Used for New User Registration */
    public function UserLogin(Request $request)
    {
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
        ]);
        
        $user = new Login();
        $res = $user->UserLogin($request);
       
        if($res) {
           return redirect('/allstudent');
        } else {
            return redirect('/login')->with('error', 'Invalid Email Id / password ! Try again');
        }
    }
}
