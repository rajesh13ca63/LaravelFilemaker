<?php

namespace App;
//use Illuminate\Database\Eloquent\Model;

use filemaker_laravel\Database\Eloquent\Model;
use DB;

class Test extends Model
{
    protected $layoutName = 'UI_StudentDetails';
    protected $primaryKey = 'StudentId_pkn';

    public function fm()
    {
        //return Test::test();
        //return Test::testQuery();
        //return Test::testElo();
        //dd('hi');
       // dd(Test::all());
      $test = $this->where('StudentName', 'Rajesh')
                    ->orderBy('StudentName', 'asc')
                    ->first();
                    
      dd($test);
    }
    
 
}