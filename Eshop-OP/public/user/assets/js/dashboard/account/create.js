 $("#create").click(function(){
    let Username =$("#Username").val();
    let Password =$("#Password").val();
    let Email =$("#Email").val();
    let Phone =$("#Phone").val();
    let Addess =$("#Addess").val();
    let FullName =$("#FullName").val();
    let Image =$("#Image").val();
    Image =Image.slice(12,Image.length);
   
    $("#errcreate").css("color","red");
    // validation
    if(FullName==""||Password==""||Email==""||Phone==""||Addess==""){
        $("#errcreate").html("Vui lòng không để chống các trường thông tin")
    }
    if(FullName.length<2||isNaN(Phone)||Phone.length!=10||Password.length<6||Addess.length<6||(!ValidateEmail(Email))){
        $("#errcreate").html("Vui lòng nhập đúng định dạng dữ liệu")
    }
    else{
        $("#errcreate").css("color","blue");
        $("#errcreate").html("Đang kiểm tra dữ liệu vui lòng đợi trong giây lát nhé...");
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/api/admin/create',
            data:{
                FullName:FullName,
                Username:Username,
                Password:Password,
                 Email:Email,
                 Phone:Phone,
                 Addess:Addess,
                 Image:Image,
            },
            success:function(data){
                if(data==-1){
                    setTimeout(() => {
                        $("#errcreate").css("color","red");
                        $("#errcreate").html("Người dùng đã tồn tại")
                    }, 2000);
                  
                }
                if(data==1){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
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
                    $("#errcreate").html("Thêm người dùng thành công");
                    }, 2000);
                   setTimeout(() => {
                    window.location.href = "/admin/account";
                   }, 3000);
                   
                }
            }
        })
    }


    

    
 })
 function ValidateEmail(email)
{
    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA]{2,4})+$/;
        if(email.match(mailformat))
            return true;
        else
            return false;
}