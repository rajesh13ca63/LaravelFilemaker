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

use Mail;
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
        $email = $request->input('email');
        $name = $request->input('name');
        $link = str_random(15);
        
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'post' => 'required',
        'usertype' => 'required'
        ]);
        
        $user = new Login();
        $user->UserRegistration($request, $link);
               
        Mail::send('mail', ['user' => $name, 'link' => $link], function ($message) use ($email) {
            $message->from($email, 'Your Registration ');
            $message->to($email, $email)->subject('Your Registration successfull');
        });
        
        return redirect('/GetUserRegistration')->with('Success', 'You have successfully register');
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
        
        session(['key' => 'rajesh']);
        
        if($res) {
           return redirect('/homepage');
        } else {
            return redirect('/login')->with('error', 'Invalid Email Id / password ! Try again');
        }
    }
    
    /* This Method is used for set password */
    public function SetPassword(Request $request) {
        echo "hi";
    }
}
