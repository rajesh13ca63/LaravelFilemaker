<!--
/**
*File name: StudentRegistration.
*File type: php.
*Date of  creation:12th May 2016.
*Author: Rajesh Gupta
*Purpose: this javascript file is used for show student records.
*Path:E:\xampp\htdocs\filemaker.
**/-->
$(document).ready(function(){
    
    $("#gridStudentList").bootgrid({
      
        ajax: true,
        post: function ()
        {
            return {
                id: "b0df282a-0d67-40e5-8558-c9e93b7befed",
                '_token': $('meta[name="csrf-token"]').attr('content')
            };
        },
        url: '/getStudentListAjax',
       
        //selection: true,
        //multiSelect: true,
        rowSelect: true,                                   
        keepSelection: true,
        rowCount:[10,25,50],
        
        formatters: {
            "commands": function(column, row)
            {
                return "<a type=\"button\" class=\"btn btn-xs btn-default command-edit btn-primary\"  data-row-id=\"" +row.RollNo + "\" + href=\"" + '/update? id='+ row.RollNo + "\"><span class=\"fa fa-pencil\"></span></a> " + 
                       "<a type=\"button\" class=\"btn btn-xs btn-default command-user btn-primary\"  data-row-id=\"" +row.RollNo + "\" + href=\"" + '/getstudentdetails? id='+ row.RollNo + "\"><span class=\"fa fa-user\"></span></a>" +
                       "<a type=\"button\" class=\"btn btn-xs btn-default command-delete btn-danger\" data-row-id=\"" +row. RollNo+ "\" + href=\"" + '/deleteStudentRecords? id='+ row.RollNo + "\"><span class=\"fa fa-trash-o\"></span></a>";
                    
            }
        }
    });
    
    $("#gridStudentList").bootgrid({
      caseSensitive: false
    });
    
  // $('#myModal').modal({
   // backdrop: 'static',
    //keyboard: false
   // });
});
   