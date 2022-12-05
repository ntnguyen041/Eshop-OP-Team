 function loadproduct(data,min,max){
    let html="";
    if(max>data.length){
        max=data.length;
    }
    if(min==-1,max==-1){
        $.each(data,function(){
           
            html += '<div class="row no-gutters">'+
            '<aside class="col-md-3">'+
                '<a href="#" class="img-wrap">'+
                    '<span class="badge badge-danger"> NEW </span>'+
                    '<img src="images/product/'+data[0].Image+'">'+
                '</a>'+
            '</aside> <!-- col.// -->'+
            '<div class="col-md-6">'+
               ' <div class="info-main">'+
                    '<a href="/product/id?'+$(this)[0].id+'" class="h5 title">'+$(this)[0].NNa+'</a>'+
                    '<div class="rating-wrap mb-2">'+
                        '<ul class="rating-stars">'+
                            '<li style="width:100%" class="stars-active"> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> '+
                            '</li>'+
                            '<li>'+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> '+
                            '</li>'+
                        '</ul>'+
                        '<div class="label-rating">9/10</div>'+
                    '</div> <!-- rating-wrap.// -->'+
                
                    '<p class="mb-3">'+
                        '<span class="tag"> <i class="fa fa-check"></i> Verified</span> '+
                        '<span class="tag"> 5 Years </span> '+
                        '<span class="tag"> 80 reviews </span>'+
                        '<span class="tag"> Russia </span>'+
                    '</p>'+
    
                    '<p>'+$(this)[0].Description+'</p>'+
    
                '</div> <!-- info-main.// -->'+
            '</div> <!-- col.// -->'+
            '<aside class="col-sm-3">'+
                '<div class="info-aside">'+
                    '<div class="price-wrap">'+
                        '<span class="h5 price">'+$(this)[0].Price+'VND</span> '+
                        '<small class="text-muted">/per item</small>'+
                    '</div> <!-- price-wrap.// -->'+
                    '<small class="text-warning">Paid shipping</small>'+
                    
                    '<p class="text-muted mt-3">Grand textile Co</p>'+
                    '<p  class="mt-3">'+
                    '<button onclick="addcart('+$(this)[0].id+')" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>'+
                    '</p>'+
                '</div> <!-- info-aside.// -->'+
            '</aside> <!-- col.// -->'+
        '</div> <!-- row.// -->'
        })
    }
    else{
        for (let item = min; item < max; item++) {
            
            html += '<div class="row no-gutters">'+
            '<aside class="col-md-3">'+
                '<a href="#" class="img-wrap">'+
                    '<span class="badge badge-danger"> NEW </span>'+
                    '<img src="images/product/'+data[item].Image+'">'+
                '</a>'+
            '</aside> <!-- col.// -->'+
            '<div class="col-md-6">'+
               ' <div class="info-main">'+
                    '<a  href="product/id?'+data[item].id+'" class="h5 title">'+data[item].NNa+'</a>'+
                    '<div class="rating-wrap mb-2">'+
                        '<ul class="rating-stars">'+
                            '<li style="width:100%" class="stars-active"> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> '+
                            '</li>'+
                            '<li>'+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> <i class="fa fa-star"></i> '+
                                '<i class="fa fa-star"></i> '+
                            '</li>'+
                        '</ul>'+
                        '<div class="label-rating">9/10</div>'+
                    '</div> <!-- rating-wrap.// -->'+
                
                    '<p class="mb-3">'+
                        '<span class="tag"> <i class="fa fa-check"></i> Verified</span> '+
                        '<span class="tag"> 5 Years </span> '+
                        '<span class="tag"> 80 reviews </span>'+
                        '<span class="tag"> Russia </span>'+
                    '</p>'+
    
                    '<p>'+data[item].Description+'</p>'+
    
                '</div> <!-- info-main.// -->'+
            '</div> <!-- col.// -->'+   
            '<aside class="col-sm-3">'+
                '<div class="info-aside">'+
                    '<div class="price-wrap">'+
                        '<span class="h5 price">'+data[item].Price+'VND</span> '+
                        '<small class="text-muted">/per item</small>'+
                    '</div> <!-- price-wrap.// -->'+
                    '<small class="text-warning">Paid shipping</small>'+
                    
                    '<p class="text-muted mt-3">Grand textile Co</p>'+
                    '<p class="mt-3">'+
                        '<button onclick="addcart('+data[item].id+')" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>'+
                    '</p>'+
                '</div> <!-- info-aside.// -->'+
            '</aside> <!-- col.// -->'+
        '</div> <!-- row.// -->'
            
        }
    }
   
    return html;
}
function loadCategory(data){
    let asdasd="";
    $.each(data,function(){
        asdasd+='<li><button onclick="searchcategory('+$(this)[0].id+')" value="'+$(this)[0].id+'" class="btn btn-primary" type="button">'+$(this)[0].Name+'</button>'
    })
    return asdasd;
}
function loadbrand(data){
    let html="";
    $.each(data,function(){
        html+='<label class="custom-control custom-checkbox">'+
        '<input type="checkbox" values="'+$(this)[0].id+'" class="custom-control-input">'+
        '<div class="custom-control-label">'+$(this)[0].Name+''+ 
             '</div>'+
      '</label>'
    })
    return html;
}
// $("#searchbutton").mousedown(function(){
//     let searchString= $.session.set('searchString',$("#searchSting").val());
//     var currentLocation = window.location;
  
//         if(currentLocation.href!="http://127.0.0.1:8000/shop"){
       
//         currentLocation.href="/shop";
//     }; 
// }) 
    let i=1;
   let min=1;
   let max=min;

function clickload(){
    
}

$("#searchbutton").click(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchSting").val();
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"api/ajax-shopsearch",
            data:{
                categoryId:"",
                stringsrearch:search,
                
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
$(document).ready(function(){
    
    $.ajax({
    type:'GET',
        url:"api/ajax-brands",
        data:{},
        success:function(data){
            $("#getbrand").html(loadbrand(data));
        }
   });
   $.ajax({
    type:'GET',
    url:"api/ajax-category",
    data:{},
    success:function(data){
        $("#Categorylist").html(loadCategory(data));
        }
    })
   let i=1;
   let min=1;
   let max=min;
    $.ajax({
        type:'GET',
        url:"api/ajax-shop",
        success:function(data){
            let items=$("#countitem").html(data.length)

            console.log(data[0].Image)
            $("#getproduct").html(loadproduct(data,0,5));
            $("#nextproduct").click(function(){
                if(max+5<data.length){
                    min=i*1*5;
                    max=min+5;
                    i=i+1;
                }else if(max+5>data.length){
                   max=max-(max-items);
                }
                $("#getproduct").html(loadproduct(data,min,max));
            })
            $("#backproduct").click(function(){
                if(i-1>=0){
                    min=i*1*5;
                    max=min+5;
                    i=i-1;
                    $("#getproduct").html(loadproduct(data,min,max));
                }
                else{
                    $("#getproduct").html(loadproduct(data,0,5));
                }
            })
        }
    })
})




function addcart(id){
    let idproduct=id;
    let userid= $.session.get('id');

    console.log(idproduct,userid);
 }
 
 
////=======Hòa Dồng========category===========/////


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
                if(data!=null){

                    $("#loadCat").html(loadcat(data));
                }
                else{
                    alert('Không thể tìm thấy')
                }
            }
            
        }
        )
    }
    else{
        alert('Không thể tìm thấy');
}})


function loadcat(data) {
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
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' +$(this)[0].Description+  ''+
                
        '</p>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        ' <a href="{{route(admin.category.edit, '+$(this)[0].Name.id+')}}"'+
        ' class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        ' <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
        '     Edit'+
        ' </button>'+
        ' </a>'+
      
        '<a href="http://127.0.0.1:8000/admin/category/?id " '+$(this)[0].Name.id+')}}" class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        '  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">'+
            'Delete'+
        ' </button>'+
        ' </a>'+
        ' </td>'+
        '</tr >'
        })
    return html; 
}

        /// search products admin
$("#searchString").keypress(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_product_admin",
            data:{
                stringsearch: search
        },
            success:function(data){
                if(data!=null){

                    $("#getproduct").html(loadproduct(data));
                }
                else{
                    alert('Không thể tìm thấy sản phẩm')
                }
            }
        }
        )
    }
    else{
        alert('Không thể tìm thấy sản phẩm');
}})