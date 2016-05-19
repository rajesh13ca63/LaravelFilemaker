
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
        url: '/SearchStudentList',
     
              
        formatters: {
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit btn-primary\" data-row-id=\""  + row.StudentId_pkn + "\"><span class=\"fa fa-pencil\"></span></button> " + 
                       "<button type=\"button\" class=\"btn btn-xs btn-default command-delete btn-danger\" data-row-id=\"" + row.StudentId_pkn + "\"><span class=\"fa fa-trash-o\"></span></button>"
                  
            }
        }
    });
  });
   