$(document).ready(function(){
    $(".empty_field").hide();  
    $(".alphabate").hide();
    $(".capital").hide();
    $(".email").hide();
    $(".only_number").hide();
    $(".alphanum_spcl").hide();
    $(".password").hide();
    $(".alphabet_spaces").hide();
    $(".numeric_value").hide();
});

function validate(e)
{
    $(".validate").each(function( index ) {
     var check = true;
      var validation = $('#'+this.id).attr('validation');
      if(typeof(validation) != "undefined"){
          var function_name = validation.split(',');
          //alert(function_name);
          for(var i = 0; i < function_name.length; i++) {
               result = window[function_name[i]](this.id)
              //alert(result);
                 if(typeof(result) == "undefined"){
                    //alert('if');
                    check = true;
                 }
                 else{
                    //alert('else');
                     $('form').submit(function() {
                       // alert('Submit blocked!');
                        check = false;
                        return false;
                    });
                   check = false;
                }
          }
      }
    });
    return 1;
}

function empty_fields(id)
{
     if (($("#"+id).val())!='') {
         $(".empty_field").hide();
     }
     else
     {
         $(".empty_field").show();
          return false;
     }

}

function alphabet(id)
{
    if(($("#"+id).val().match('^[a-zA-Z]{3,16}$'))){
       // alert('if'+$("#"+id).val());
         $(".alphabate").hide();
     }

     else{
        //alert('else'+$("#"+id).val())
         $(".alphabate").show();
          return false;

     }
}
 function capital(id)
 {
     if(($("#"+id).val().match('^[A-Z]{3,16}$'))){
         $(".capital").hide();

     }
     else{
         $(".capital").show();
         return false;

     }
 }

function email(id)
{
if(($("#"+id).val().match('^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$'))){
    //alert('if'+$("#"+id).val());
     $(".email").hide();
 }

 else{
    //alert('else'+$("#"+id).val())
     $(".email").show();
      return false;

 }
}

function only_numbers(id)
{
if(($("#"+id).val().match('^[0-9]{10}$'))){
    //alert('if'+$("#"+id).val());
     $(".only_number").hide();
 }

 else{
     $(".only_number").show();
      return false;

 }
}
  
function alphanumeric_exceptstar(id)
{
if(($("#"+id).val().match('^[a-zA-Z0-9+-.,:;@#$%?/_]+$'))){
    //alert('if'+$("#"+id).val());
     $(".alphanum_spcl").hide();
 }

 else{
    //alert('else'+$("#"+id).val())
     $(".alphanum_spcl").show();
     return false;
 }
}

function alphanumeric_password(id)
{
if(($("#"+id).val().match('^[a-zA-Z0-9+-.,:;@#$%?/_]+$'))){
    //alert('if'+$("#"+id).val());
     $(".password").hide();
 }

 else{
    //alert('else'+$("#"+id).val())
     $(".password").show();
      return false;

 }
}

function alphabet_space(id)
{
    if(($("#"+id).val().match('^[a-zA-Z ]{3,16}$'))){
       // alert('if'+$("#"+id).val());
         $(".alphabet_spaces").hide();
     }

     else{
        //alert('else'+$("#"+id).val())
         $(".alphabet_spaces").show();
         return false;
     }
}

function numeric_only(id)
{
    if(($.isNumeric($("#"+id).val()))){
        //alert('if'+$("#"+id).val());
         $(".numeric_value").hide();
     }

     else{
        //alert('else'+$("#"+id).val())
         $(".numeric_value").show();
         return false;
     }
}