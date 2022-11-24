$(document).ready(function(){
    let id=$.session.get('id');
    $.ajax({
     url:'api/user',
     type:'get',
     data:{id:id},
     success:function(data){
         $("#user").val(data[0].Username);
         $("#fullname").val(data[0].FullName);
         $("#email").val(data[0].Email);
         $("#phone").val(data[0].Phone);
         $("#address").val(data[0].Address);
     }
    })
})
$("#update").click(function(){
    let user= $("#user").val();
    let fullname= $("#fullname").val();
    let email= $("#email").val();
    let phone= $("#phone").val();
    let address= $("#address").val();

    console.log(user,fullname,email,phone,address);
})
    