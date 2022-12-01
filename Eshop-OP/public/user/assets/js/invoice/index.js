function loadinvoice(data){
    let html="";
    let trangthai = "";
    $.each(data,function(){
        if($(this)[0].Status == 0)
        {
            trangthai = 'Chưa xác nhận';
        }
        if($(this)[0].Status == 1)
        {
            trangthai = 'Đang giao';
        }
        else{
            trangthai = 'Đã xác nhận';
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
            '<a href="/orderuser/details" class="btn btn-primary">Detail</a></div>'+
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