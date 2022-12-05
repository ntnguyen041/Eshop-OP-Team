// chức năng đăng ký tài khoản
$("#Register").click(function(){
    let fullname =$("#fullname").val();
    let user= $("#user").val();
    let pass = $("#Pass").val();
    let Repeatpass = $("#Repeatpass").val();

    if(user=="" || pass=="" || Repeatpass=="" || fullname==""){
        $("#errcreate").css("color","red")
        $("#errcreate").html("Vui lòng nhập");
    }
       
    if(fullname.length<=2){
        $("#errcreate").css("color","red")
        $("#errcreate").html("Tên phải lớn hơn 2 ký tự");
    }
    if(Repeatpass!=pass)
        $("#errcreate").html("Mật khẩu không trùng khớp");
    if(user!=""&&pass!=""&& Repeatpass==pass&& pass.length>=6){
        $("#errcreate").css("color","blue")
        $("#errcreate").html("Đang kiểm tra đăng ký");
        $.ajax({
            type:'POST',
            url:'api/createAccount',
            data:{
                fullname:fullname,
                user:user,
                pass:pass
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
                    window.location.href = "/";
                 }, 3100);
               }
               else{
                setTimeout(() => {
                    $("#errcreate").css("color","red")
                    $("#errcreate").html("Tài khoản Đã tồn tại, vui lòng nhập tài khoản khác!");
                }, 2000);
                
               }
            }
        })
    }  
})
// xem thông tin 1 tài khoản
