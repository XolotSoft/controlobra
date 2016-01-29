var AJAX_PATH = WEB_ROOT+"/ajax/registro.php";

$(document).ready(function($) 
{
    $(document).on("submit", "#registro", function(event)
    {
        var p = $("#page").val();
        var id = $("#id").val();
        event.preventDefault();
        $.ajax({
            url: AJAX_PATH,
            type: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                var splitResp = response.split("[#]");
                $("#loader").html("");
                if(splitResp[0] == "ok"){ 
                   swal({
                      title: "Informacion guardada correctamente!!",
                      type: "success",
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true,
                    },
                    function(){
                      window.location.replace(WEB_ROOT+"/login");
                    });
                } else if (splitResp[0] == "fail"){
                    swal({
                          type: "warning",
                          title: "Atencion!",
                          text: splitResp[1],
                          timer: 1500,
                          showConfirmButton: false
                        });
                } else {
                    alert(msgFail);
                }
            },
            error:function() {
            }
        });        
    });
    
  }); 
