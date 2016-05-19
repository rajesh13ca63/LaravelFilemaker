<?php
/**--------------------------------------------
*File name: StudentRegistration.
*File type: php.
*Date of  creation:19th May 2016.
*Author: Rajesh Gupta
*Purpose: This php file is used for Login Model. 
*Path:E:\xampp\htdocs\laravelfilemaker.
**---------------------------------------------*/
namespace App;

use filemaker_laravel\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use App\Requests;

class Login extends Model
{
    protected $layoutName = 'UI_LoginMainPage';
    protected $primaryKey = 'UserId_pkn';
    
    /* This Method is used for create New user registstration records */
    public function UserRegistration($request) {
        
        $user = new Login();
        $user->Name_xt = $request['name'];
        $user->EmailId_xt = $request['email'];
        $user->Password_xt = MD5($request['password']);
      
        $user->save();
    }
    
    /* This Method is used for User Login */
    public function UserLogin($request)
    {
        $user = Login::where('EmailId_xt', '=', $request['email'])
                    ->where('Password_xt', '=', MD5($request['password']))
                    ->first();
       
        return $user;
    }
}
