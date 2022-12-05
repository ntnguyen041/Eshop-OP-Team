
function loadproductall(){
    
}

function loadproduct(data,min,max){
    let html="";
    if(max>data.length){
        max=data.length;
    }
    for (let item = min; item < data.length; item++) {
        let str=data[item].NNa.slice(0,30);
         if(data[item].NNa.length>30){
            str+='...'
         }
        html+='<div class="col-md-4"><figure class="card card-product-grid">'+
        '<div class="img-wrap"> '+
        '<img src="images/product/'+data[item].Image+'">'+
        '</div> <!-- img-wrap.// -->'+
        '<figcaption class="info-wrap">'+
        '<a href="product/id?'+data[item].id+'"class="title mb-2">'+str+'</a>'+
        '<div class="price-wrap mb-3">'+
        '<span class="price">'+data[item].Price+'</span> '+
        '<small class="text-muted">/per item</small>'+
        '</div> <!-- price-wrap.// -->'+
        '<a href="product/id?'+data[item].id+'" class="btn btn-primary"> <i class="fa fa-eye"></i> View </a> '+
        '<button onclick="addcart('+data[item].id+')" class="btn btn-success"> <i class="fa fa-shopping-cart"></i> Add to cart </button>'+
       
        
        '</figcaption>'+
    '</figure> </div>'    
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
        '<input type="checkbox" onclick="checkidbrand()" name="'+$(this)[0].id+'" value="'+$(this)[0].id+'">'+$(this)[0].Name+''+
       
      '</label>'
    })
    return html;
}

$(document).ready(function(){
    
    $.session.set('search',"null")
    $.session.set('idCate',-1);
    $.session.set('listidbrand', "");
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
    $.ajax({
        type:'GET',
        url:"api/ajax-shop",
        success:function(data){
            let items=$("#countitem").html(data.length)
            $("#getproduct").html(loadproduct(data,0,5));
        }
    })
})
// tim phan tu chung 

$("#getidbrand").click(function(){
    var names =[];
    $("#getbrand input:checked").map(function(){
        names=names.concat(Number(this.name));
    })
    $.session.set('listidbrand', names);
    let categoryId = $.session.get('idCate');
    let stringsrearch=$("#searchSting").val();
    $.ajax({
        url:'api/ajax-shopsearch',
        type:'GET',
        data:{
            // categoryId:categoryId,
            stringsrearch:stringsrearch
        },
        success:function(data){
            if(names.length!=0){
                if(categoryId!=-1){
                    var datafull=[];
                    for (let item = 0; item < data.length; item++) {
                        if(data[item].Category_id==categoryId){
                            datafull=datafull.concat(data[item])
                        }
                    }
                        let result =[];
                        for (let i = 0; i < names.length; ++i) {
                            for (let j = 0; j <datafull.length; ++j) {
                                // console.log(names[i],datafull[j].Brand_id);
                                if (names[i]==datafull[j].Brand_id) {
                                    /*Tìm thấy phần tử trùng thì thêm vào mảng kết quả*/
                                    result=result.concat(datafull[j]);
                                }
                            }
                        }
                    $("#countitem").html(result.length)
                     $("#getproduct").html(loadproduct(result,0,5));
                }
                else{
                    console.log('aaaa')
                    let datafull =[];
                        for (let i = 0; i < names.length; ++i) {
                            for (let j = 0; j <data.length; ++j) {
                                // console.log(names[i],datafull[j].Brand_id);
                                if (names[i]==data[j].Brand_id) {
                                    /*Tìm thấy phần tử trùng thì thêm vào mảng kết quả*/
                                    datafull=datafull.concat(data[j]);
                                }
                            }
                        }
                    $("#countitem").html(datafull.length)
                     $("#getproduct").html(loadproduct(datafull,0,5));
                }
               
            }
            if(names.length==0){
                if(categoryId==-1){
                    $("#countitem").html(data.length)
                     $("#getproduct").html(loadproduct(data,0,5));
                }
            }
        }
    })
})
function searchcategory(e){
    let categoryId=e;
    $.ajax({
        url:'api/ajax-shopsearch',
        type:'GET',
        data:{
            categoryId:categoryId,
            stringsrearch:"",
        },
        success:function(data){
            $("#countitem").html(data.length)
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
}
function addcart(id){
    let idproduct=id;
    let userid= $.session.get('id');

    console.log(idproduct,userid);
 }
 
///category

function loadCat(data){
    let html="";
    $.each(data,function(){
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
        ' <a href="{{route(admin.brand.edit, '+$(this)[0].Name.id+')}}"'+
        ' class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        ' <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
        '     Edit'+
        ' </button>'+
        ' </a>'+
        '<a href="{{route(admin.category.destroy,'+$(this)[0].Name.id+')}}" class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        '  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">'+
            'Delete'+
        ' </button>'+
        ' </a>'+
        ' </td>'+
        '</tr >'
    })
    return html;
}


$("#searchString").keypress(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchString").val();
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_category",
            data:{
                stringsearch: search
        },
            success:function(data){
                if(data!=0){
                    $("#loadCat").html(loadCat(data));
                }
                else{
                    alert('chúng tôi không thể tìm thấy loại sản phẩm này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm thấy loại sản phẩm này')
    }
})


////Hòa đồng search sản phẩm admin
function loadPA(data){
    let html="";
    $.each(data,function(){
        html += '<tr>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">' +
        '<div class="flex px-2 py-1">'+
        '<div class="flex flex-col justify-center">'+
        '<h6 class="mb-0 text-sm leading-normal dark:text-white">'+$(this)[0].Name+
        '</h6>'+
        ' </div>'+
        '</div>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '<p style="white-space: normal;" class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'
        +$(this)[0].Description+
        '</p>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' +$(this)[0].Price+  
        '</p>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' +$(this)[0].Stock+  
        '</p>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' +$(this)[0].Brand_id+  
        '</p>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' +$(this)[0].Category_id+  
        '</p>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        '<img src="/images/product/'+$(this)[0].Image+ '" style="height:100px; width:100px">'+
        '</p>'+
        '</td>'+
        
        '</td>'+
        
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
        ' <a href="{{route(admin.product.edit, '+$(this)[0].Name.id+')}}"'+
        ' class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        ' <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
        '     Edit'+
        ' </button>'+
        ' </a>'+
      //
        '<a href="{{route(admin.product.destroy '+$(this)[0].Name.id+')}}" class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        '  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">'+
            'Delete'+
        ' </button>'+
        ' </a>'+
        ' </td>'+
        '</tr >'
    })
    return html;
}

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
                if(data!=0){
                    $("#getproduct").html(loadPA(data));
                }
                else{
                    alert('chúng tôi không thể tìm thấy sản phẩm này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm thấy sản phẩm này')
    }
})

 


