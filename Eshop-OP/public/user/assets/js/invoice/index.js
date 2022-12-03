function loadinvoice(data){
    let html="";
    let trangthai = "";
    $.each(data,function(){
        if($(this)[0].Status == 0)
        {
            trangthai = 'Chưa xác nhận';
        }
        else if($(this)[0].Status == 3)
        {
            trangthai = 'Đang giao';
        }
        else if($(this)[0].Status == 2)
        {
            trangthai = 'Đã xác nhận';
        }
        else{
            trangthai = 'Giao thành công';
        }
        html+='<hr>'+
        '<div class="row">'+
        '<div class="col-md">'+$(this)[0].Code+'</div>'+
        '<div class="col-md">'+$(this)[0].IsuedData+'</div>'+
        '<div class="col-md">'+$(this)[0].ShoppingAddress+'</div>'+
        '<div class="col-md">'+$(this)[0].ShoppingPhone+'</div>'+
        '<div class="col-md">'+$(this)[0].Total+'</div>'+
        '<div class="col-md">'+trangthai+'</div>'+
        '<div class="col-md"> '+
            '<a href="/orderuser/details/'+$(this)[0].id+'"  class="btn btn-primary">Detail</a></div>'+
        '</div>'
        
    })
    return html;
}


$(document).ready(function(){
    
    let id = $.session.get('id');
    $.ajax({
        url:'/orderuser',
        type:'GET',
        data:{id:id},
        success:function(data){
            console.log(data)
            $("#Invoicelist").html(loadinvoice(data));
        }
    })
})