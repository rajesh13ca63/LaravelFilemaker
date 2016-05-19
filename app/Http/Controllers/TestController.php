<?php

namespace App\Http\Controllers;
use App\Test;
//use App\FileMakerModels\Test;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function testsearch(){
        $test = new Test();
        $test->fm();
    }
     
    public function sum()
    {
        $a=10;
        $b=10;
        $sum = $a + $b;
        echo $sum;
    }
    

}
