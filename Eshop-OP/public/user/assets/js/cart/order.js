$("#odernow").click(function(){
    let id =$.session.get('id');
    let phone= $("#phone").val();
    let address= String($("#address").val());
    if($('#totalinput').val()!=""){

      total=$('#totalinput').val();
    }
    $("#errcreate").css("color","red");
     if(phone==""||address==""){
       
        $("#errcreate").html("Please! fill your infomation")
     }
     if(isNaN(phone)||phone.length!=10){
        $("#errcreate").html("Please! fill correctly data format")
     }
     else{
        $("#errcreate").css("color","green");
        $("#errcreate").html("Please! waitting")
        $.ajax({
            url:'http://127.0.0.1:8000/api/ordernow',
            type:'post',
            data:{
                id:id,
                phone:phone,
                address:address,
            },
            success:function(data){
                if(data==1){
                    window.location.href = "/orderuser/order";
                   }
                   else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      showConfirmButton: false,
                      timer: 1500
                  })}
            }
        })
    }});
