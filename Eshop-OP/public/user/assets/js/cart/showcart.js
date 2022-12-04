function loadcart(data) {
    let html = "";
    let pricecart;
    let total=0;
    
    $.each(data, function () {
        pricecart = $(this)[0].Price * $(this)[0].Quantity;
        total+=pricecart;
        html +='<tr>'+
        '<td>' +
        '<figure class="itemside">' +
        '<div class="aside"><img src="images/product/'+$(this)[0].Image+'"class="img-sm"></div>' +
        '<figcaption class="info">' +
        '<a href="#" class="title text-dark">'+$(this)[0].Name+'</a>' +
        '<p class="text-muted small">'+$(this)[0].Description+'</p>' +
        '</figcaption>' +
        '</figure>' +
        '</td>' +
        '<td> ' +
        '<div class="btn btn-light">'+
        '<input onclick="changecart1()" type="number" step="1" min="1" max="'+$(this)[0].Stock+'" class="carousel-inner text-center changesCart" value="'+$(this)[0].Quantity+'" aria-label="none" aria-describedby="button-addon1">'+
        '<input type="hidden" value="'+$(this)[0].ProductID+'" class="idProduct"/>'+
        '</div>'+
        '</td>' +
        '<td> ' +
        '<div class="price-wrap"> ' +
        '<var class="price">'+pricecart+'</var> ' +
        '<small class="text-muted"> '+$(this)[0].Price+' </small> ' +
        '</div> ' +
        '</td>'+
        '<td class="text-right"> ' +
        '<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> ' +
        '<button onclick="removecart('+$(this)[0].ProductID+')" class="btn btn-light"> Remove</button>' +
        '</td>' +
        '</tr>'
    });
    return html;
}
$(document).ready(function () {
    let userid = $.session.get("id");
    let pricecart;
    let total=0;
    let notify=0;

    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/api/carts",
        data: { id: userid },
        success: function (data) {
            console.log(data);
            if (data != -1){
                $.each(data, function () {
                    ++notify;
                    pricecart = $(this)[0].Price * $(this)[0].Quantity;
                    total+=pricecart;
                });

                $("#cartItem").html(loadcart(data));
                $("#total").html(''+total+'');
                $("#notify").html(''+notify+'');
            }
        },
    });   
});

function addcart(id){
    let idproduct=id;
    let userid= $.session.get('id');
    let notify=0;
    $.ajax({
        type:'GET',
        url:'http://127.0.0.1:8000/api/ajax-addToCart',
        data:{
            id:userid,
            idproduct:idproduct
        },
        success:function(data){
            $.each(data, function () {
                ++notify;
                
            });
            $("#notify").html(''+notify+'');
            if(data!=-1){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'The product has been added to cart',
                showConfirmButton: false,
                timer: 1500
            })}else{
                Swal.fire({
                    icon: 'error',
                    title: 'The product has not been added to the cart!',
                    text: 'Product is overloaded',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
        error:function(){
            Swal.fire({
                icon: 'error',
                title: 'The product has not been added to the cart!',
                text: 'Please log in',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function removecart(ProductID){
    let userid=$.session.get('id');
    $.ajax({
        type:'GET',
        url:'api/removecart',
        data:{
            id:userid,
            idproduct:ProductID
        },
        success:function(data){
            if(data!=-1){
                $("#cartItem").html(loadcart(data));
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error!!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
        error:function(){
            Swal.fire({
                icon: 'error',
                title: 'Error!!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function changecart1(){
    let total=0;
    let Quantity=$(".changesCart").val();
    let idProduct=$(".idProduct").val();
    let userid = $.session.get("id");

    $.ajax({
        type:'GET',
        url:'api/update_carts',
        data:{
            Id:userid,
            Quantity:Quantity,
            ProductID:idProduct
        },
        success: function(data){
            if(data!=-1){
                $.each(data, function () {
                    total+= $(this)[0].Price * $(this)[0].Quantity;
                });
            $("#cartItem").html(loadcart(data));
            $("#total").html(''+total+'');
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error!!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
})}

$('#deleteAll').click(function(){
    let userid = $.session.get("id");
    $.ajax({
        url:'api/deleteAll',
        type:'get',
        data:{id:userid},
        success: function(data){
            if(data!=-1){
                Swal.fire({
            icon: 'success',
            title: 'Success!',
            showConfirmButton: false,
            timer: 1500
            
        })
        $("#cartItem").html(loadcart(data));
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error!!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    },
    },
    )
})


/// Hòa đồng

$("#searchString").keypress(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    // alert('chúng tôi không thể tìm thấy thương hiệu này')
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_category",
            data:{
                stringsearch: search
        },
            success:function(data){
                console.log(data)
                if(data!=null){
                    // $("#countitem").html(data.length)
                    $("#loadCat").html(loadcart(data));
                }
                else{
                    alert('Không thể tìm thấy')
                }
            }
            
        }
        )
    }
    else{
        alert('Không thể tìm thấy');}})


function loadcart(data) {
            let html = ""
            $.each(data, function () {
                html += '<tr>'+
                '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">' +
                '<div class="flex px-2 py-1">'+
                '<div class="flex flex-col justify-center">'+
                '<h6 class="mb-0 text-sm leading-normal dark:text-white">'+$(this)[0].Name+
                '</h6>'+
                ' </div>'+
                '</div>'+
                '</td>'+
                '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'
                   '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'
                   +$(this)[0].Description+        
                '</p>'+
                '</td>'+
                '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
                ' <a href="{{route('+'admin.brand.edit', +'$brand->id)}}"'+
                ' class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
                ' <button'+
                '    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
                '     Edit'+
                ' </button>'+
                ' </a>'+
                '  <form action="{{route('+'admin.brand.destroy', '+$brand->id)}}" method="POST">'+
                '       @csrf'+
                '       @method('+'DELETE'+')'+
                '  <button'+
                '      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"'+
                '             type="submit">'+
                '                     Delete'+
                '   </button>'+
                '   </form>'+
                ' </td>'+
                '</tr >'
            })
            return html; 
        }