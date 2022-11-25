$(document).ready(function(){
    let id=$.session.get('id');
    $.ajax({
     url:'api/user',
     type:'get',
     data:{id:id},
     success:function(data){
         $("#user").html(data[0].Username);
         $("#fullname").val(data[0].FullName);
         $("#email").val(data[0].Email);
         $("#phone").val(data[0].Phone);
         $("#address").val(data[0].Address);
     }
    })
})
$("#update").click(function(){
   
    let fullname= $("#fullname").val();
    let email= $("#email").val();
    let phone= $("#phone").val();
    let address= $("#address").val();

     if(fullname==""||email==""||phone==""||address==""||fullname.length<6||address.length<6){
        $("#errcreate").css("color","red");
        $("#errcreate").html("Vui lòng nhập đủ các trường thông tin!")
     }
     else{
        $("#errcreate").css("color","blue");
        $("#errcreate").html("Đang kiểm tra cập nhật vui lòng đợi trong giây lát nhé...")
        console.log(fullname,email,phone,address);
     }
    // $.ajax({
    //     url:'api/user',
    //     type:'post',
    //     data:{
    //         fullname:fullname,
    //         email:email,
    //         phone:phone,
    //         address:address
    //     },
    //     success:function(data){

    //     }
    // })
    
})
    