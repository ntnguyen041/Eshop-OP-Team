$(document).ready(function(){
    let id =$.session.get('id');
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
function ValidateEmail(email)
{
    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA]{2,4})+$/;
        if(email.match(mailformat))
            return true;
        else
            return false;
}
$("#update").click(function(){
    let id =$.session.get('id');
    let fullname= $("#fullname").val();
    let email= $("#email").val();
    let phone= $("#phone").val();
    let address= String($("#address").val());
    $("#errcreate").css("color","red");
     if(fullname==""||email==""||phone==""||address==""){
       
        $("#errcreate").html("Vui lòng không để chống các trường thông tin")
     }
     if(fullname.length<2||isNaN(phone)||phone.length!=10||(!ValidateEmail(email))){
        $("#errcreate").html("Vui lòng nhập đúng định dạng dữ liệu")
     }
     else{
        $("#errcreate").css("color","blue");
        $("#errcreate").html("Đang kiểm tra cập nhật vui lòng đợi trong giây lát nhé...")
       console.log(phone)
        $.ajax({
            url:'api/userupdate',
            type:'post',
            data:{
                id:id,
                fullname:fullname,
                email:email,
                phone:phone,
                address:address
            },
            success:function(data){
               
                if(data==1){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                      Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                      })
                      setTimeout(() => {
                        $("#errcreate").css("color","blue");
                        $("#errcreate").html("Cập nhật dữ liệu thành công")
                    }, 2000);
                   }
                   else{
                    setTimeout(() => {
                        $("#errcreate").css("color","red")
                        $("#errcreate").html("Gặp sự cố không thể thay đổi ");
                    }, 2000);
                    
                   }
            }
        })
     }
    
    
})
    