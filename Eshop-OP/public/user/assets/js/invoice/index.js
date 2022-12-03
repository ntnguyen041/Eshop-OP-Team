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


/////////search hoa don

$("#searchbutton").click(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    //alert('sdfasd')
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_order",
            data:{
                stringsearch: search
        },
            success:function(data){
                if(data!=0){
                    // $("#countitem").html(data.length)
                    $("#getorder").html(loadorder(data));
                }
                else{
                    alert('chúng tôi không thể tìm hóa đơn này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm hóa đơn này')
    }
})

function searchinvoice(e){
    let invoiceId=e;
    $.ajax({
        url:'api/ajax-search_order',
        type:'GET',
        data:{
            invoiceId:invoiceId,
            stringsrearch:"",
        },
        success:function(data){
            // $("#countitem").html(data.length)
            $("#getinvoice").html(loadorder(data));
        }
    })
    return view
}

$(document).ready(function(){

    let id = $.session.get('id');
    $.ajax({
        url:'/orderuser',
        type:'GET',
        data:{id:id},
        success:function(data){
            console.log(data)
            $("#Invoicelist").html(loadorder(data));
        }
    })
})

function loadorder(data){
    let html="";
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
        html+='<tr>'+
        '<td'+
        '    class="p-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <div class="flex px-2 py-1">'+
        '        <p style="white-space: normal;"'+
        '            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 ">'+$(this)[0].Code+'</p>'+
        '    </div>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Full+' </p>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].IsuedData+'</p>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].ShoppingAddress+'</p>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].ShoppingPhone+'</p>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Total+' </p>'+
        '</td>'+
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <p'+
        '        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].trangthai+' </p>'+
        '</td>'+
        
        '<td'+
        '    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '    <a href=""'+
        '        class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        '        <button'+
        '            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
        '            Detail'+
        '        </button>'+
        '    </a>'+
        '</td>'+
        '</tr>'
    })
    return html;
}

////////////// lọc hóa đơn

$("#searchbutton").click(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    //alert('sdfasd')
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_order",
            data:{
                stringsearch: search
        },
            success:function(data){
                if(data!=0){
                    // $("#countitem").html(data.length)
                    $("#getorder").html(loadorder(data));
                }
                else{
                    alert('chúng tôi không thể tìm hóa đơn này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm hóa đơn này')
    }
})
