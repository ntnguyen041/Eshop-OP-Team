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

//search hoa don

$("#searchbutton").click(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"api/ajax-search_order",
            data:{
                categoryId:"",
                stringsrearch:$("#searchSting").val(),
                
        },
            success:function(data){
                if(data!=0){
                    $("#countitem").html(data.length)
                    $("#getproduct").html(loadproduct(data,0,data.length));
                }
                else{
                    alert('chúng tôi không thể tìm sản phẩm này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm sản phẩm này')
    }
}) 

function searchinvoice(e){
    let invoiceId=e;
    $.ajax({
        url:'api/ajax-shopsearch',
        type:'GET',
        data:{
            invoiceId:invoiceId,
            stringsrearch:"",
        },
        success:function(data){
            $("#countitem").html(data.length)
            $("#getproduct").html(loadinvoice(data,0,5));
            $("#nextproduct").click(function(){
                // if(max+5<data.length){
                //     min=i*1*5;
                //     max=min+5;
                //     i=i+1;
                // }else if(max+5>data.length){
                //    max=max-(max-items);
                // }
                $("#getinvoice").html(loadinvoice(data,min,max));
            })
           
        }
    })
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
//------------------------------------//