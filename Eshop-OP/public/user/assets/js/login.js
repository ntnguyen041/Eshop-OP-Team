$(document).ready(function(){

  
})
$("#login").click(function(){
   // lay ra khi tren the ddo value
    let user =$("#Username").val();//lay 
    let pass=$("#Password").val();
    if(user==""&& pass==""){
        alert("vui long nhap");
    }
    else{
        $.ajax({
            type:'GET',
                url:"./accout",
                data:{
                    user:user,
                    pass:pass,
                },
                success:function(data){
                    // kiem tra admin tao secction admin
                    //console.log(data[0].IsAdmin);
                    if(data[0].IsAdmin==1){
                        $.session.set('id', data[0].id);
                        $.session.set('IsAdmin', data[0].IsAdmin);
                        $.session.set('name', data[0].Username);
                    }
                    if(data[0].IsAdmin==0){
                        $.session.set('id', data[0].id);
                        $.session.set('IsAdmin', "0");
                        $.session.set('name', data[0].Username);
                    }
                    window.location.href = "/";
                }
           });
   }
})