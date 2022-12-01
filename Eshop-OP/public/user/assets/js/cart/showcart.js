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
        '    <figcaption class="info">' +
        '        <a href="#" class="title text-dark">'+$(this)[0].Name+'</a>' +
        '        <p class="text-muted small">Size: XL, Color: blue, <br> Brand: Gucci</p>' +
        '    </figcaption>' +
        '</figure>' +
        '</td>' +
        '<td> ' +
        '<div class="btn btn-light">'+
        '    <input onclick="changecart1()" type="number" step="1" min="1" max="'+$(this)[0].Stock+'" class="carousel-inner text-center changesCart" value="'+$(this)[0].Quantity+'" aria-label="none" aria-describedby="button-addon1">'+
        '<input type="hidden" value="'+$(this)[0].ProductID+'" class="idProduct"/>'+
        '</div>'+
        '</td>' +
        '<td> ' +
        '<div class="price-wrap"> ' +
        '    <var class="price">'+pricecart+'</var> ' +
        '    <small class="text-muted"> '+$(this)[0].Price+' </small> ' +
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
        url: "api/carts",
        data: { id: userid },
        success: function (data) {
            console.log(data);
            if (data == -1) {
                alert("Bạn chưa có sản phẩm nào trong giỏ hàng");
                window.location.href = "/shop";
            } else {
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
    // let notify=0;
    // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $.ajax({
        type:'GET',
        url:'api/ajax-addToCart',
        // dataType: 'Json',
        data:{
            id:userid,
            idproduct:idproduct
        },
        success:function(data){
            // $.each(data, function () {
                
            //     ++notify;
            // });
            // $("#notify").html(''+notify+'');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Đã thêm vào giỏi hàng!',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error:function(){
            Swal.fire({
                icon: 'error',
                title: 'Chưa thêm vào giỏi hàng!',
                text: 'Vui lòng đăng nhập',
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
            pdid:ProductID
        },
        success:function(data){
            window.location.reload();
        },
        error:function(){
            Swal.fire({
                icon: 'error',
                title: 'Xóa không thành công!!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function changecart1(){

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
            if(data==1){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Sửa thành công!',
                showConfirmButton: false,
                timer: 1500
            })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Sửa không thành công!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
})}