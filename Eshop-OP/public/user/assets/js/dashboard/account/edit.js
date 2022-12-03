$(document).ready(function(){
    let id=$.session.get('editid');
    $.ajax({
        url:'http://127.0.0.1:8000/api/user',
        type:'get',
        data:{id:id},
        success:function(data){
            // console.log(data.Avatar);
            $("#FullName").val(data.FullName);
            $("#Username").val(data.Username);
            $("#Password").val(data.Password);
            $("#Email").val(data.Email);
            $("#Phone").val(data.Phone);
            $("#Addess").val(data.Address);
            $("#imagea").html('<form method="post" id="upload_form" enctype="multipart/form-data">'+
            '<img id="Image" height="200" width="200" src="../../user/assets/images/avatars/'+data.Avatar+'" alt="'+data.Avatar+'">'+
            '<label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>'+
            '<input id="imagecheck" value="'+data.Avatar+'" type="file" onchange="chooseFile(this)" accept="image/*" name="Image"></form>');
        }
       })
})
function chooseFile(fileInput){
    if(fileInput.files && fileInput.files[0]){
        var reder =new FileReader();
        reder.onload=function(e){
            $("#Image").attr('src',e.target.result);
        }
        reder.readAsDataURL(fileInput.files[0]);
        // console.log(fileInput.files[0].name)
    $.session.set('imageup',fileInput.files[0].name);
        
    }
}

$("#edituser").click(function(){
    let FullName =$("#FullName").val();
    let Username =$("#Username").val();
    let Password =$("#Password").val();
    let Email =$("#Email").val();
    let Phone =$("#Phone").val();
    let Address =$("#Addess").val();
    let Image ="no";
    // upload anh
    let formData =new FormData();
    let file =$("#imagecheck")[0].files[0];
    formData.append('file',file)
    if(file!=null){
        Image=file.name;
    }
    //validation
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
            type:'get',
            url:'http://127.0.0.1:8000/api/admin/acedict',
            data:{
                FullName:FullName,
                Username:Username,
                Password:Password,
                Email:Email,
                Phone:Phone,
                Address:Address,
                Image:Image
                
            },
            success:function(data){
                if(data==0&&file==null){
                    setTimeout(() => {
                        $("#errcreate").css("color","red");
                        $("#errcreate").html("Bạn đã chưa nhập trường cần thay đổi")
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
                    $("#errcreate").html("Cập nhật người dùng thành công");
                    }, 2000);
                   setTimeout(() => {
                    window.location.href = "/admin/account";
                   }, 3000);
                }
                if(file!=null){
                    $("#errcreate").css("color","blue");
                    $("#errcreate").html("Cập nhật dữ liệu...");
                    setTimeout(() => {
                    $("#errcreate").html("Đang xử lý upload ảnh...");
                       }, 1000);
                    $.ajax({
                        url:'http://127.0.0.1:8000/api/admin/uploadfile',
                        type:'post',
                        contentType:false,
                        processData:false,
                        // dataTyPe:'json',
                        data: formData,
                        success:function(data){
                            console.log(data);
                        }
                    })
                }
            }
        })
    }
    //
   
   
   
   
    
   
})
 function ValidateEmail(email)
{
    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA]{2,4})+$/;
        if(email.match(mailformat))
            return true;
        else
            return false;
}