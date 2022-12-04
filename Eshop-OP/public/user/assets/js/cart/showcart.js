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

