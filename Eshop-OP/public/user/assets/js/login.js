$("#login").click(function(){
   // lay ra khi tren the ddo value
    let user =$("#Username").val();//lay 
    let pass=$("#Password").val();
    $("#err").css("color","red")
    if(user==""&& pass==""){
      $("#err").html("vui lòng nhập");
    }
    else{
        $.ajax({
            type:'GET',
                url:"api/accout",
                data:{
                    user:user,
                    pass:pass,
                },
                success:function(data){
                    if(data==-1){
                       $("#err").html("Mật khẩu và tài khoản không đúng");
                    }
                    else{
                        if(data.IsAdmin==1){
                            $.session.set('id', data.id);
                            $.session.set('IsAdmin', data.IsAdmin);
                            $.session.set('name', data.Username);
                            $("#err").html("");
                            window.location.href = "/";
                        }
                        if(data.IsAdmin==0){
                            $.session.set('id', data.id);
                            $.session.set('IsAdmin', "0");
                            $.session.set('name', data.Username);
                            $("#err").html("");
                            window.location.href = "/";
                        }
                    }
                }
           });
   }
})