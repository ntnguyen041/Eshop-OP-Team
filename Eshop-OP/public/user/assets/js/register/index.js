$("#Register").click(function(){
    var user= $("#user").val();
    var pass = $("#Pass").val();
    var Repeatpass = $("#Repeatpass").val();
    if(user==null||pass==null||Repeatpass==null)
        $("#errcreate").html("Vui lòng nhập");
    if(Repeatpass!=pass)
        $("#errcreate").html("Mật khẩu không trùng khớp");
    if(user!=null&&pass==null&&Repeatpass==pass)
     console.log('chuan bi dang ky');
})