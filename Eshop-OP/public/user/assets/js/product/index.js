function loadproduct(data,min,max){

    let html="";
    if(max>data.length){
        max=data.length;
    }
    $("#backproduct").click(function(){
       if(max==5){
        max=5;
        min=0
       }
    })
    $("#nextproduct").click(function(){
        
    })
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
function timphantucung( array1, array2){
    let result = [];
    for (let i = 0; i < array1.length - 1; ++i) {
        for (let j = array2; j < array2.length-1; ++j) {
            if (array[i] == array[j]) {
                console.log(array1[i])
                /*Tìm thấy phần tử trùng thì thêm vào mảng kết quả*/
                result[count]=array[i];
                ++ count;
            }
        }
    }
    return result
}

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
    // console.log(e,$.session.get('search'))
    let categoryId=e;
    $.session.set('idCate', e);
    $.ajax({
        url:'api/ajax-shopsearch',
        type:'GET',
        data:{
            // categoryId:categoryId,
            stringsrearch: $.session.get('search'),
        },
        success:function(data){
            var datafull=[];
            for (let item = 0; item < data.length; item++) {
                if(data[item].Category_id==e){
                    datafull=datafull.concat(data[item])
                }
            }
            console.log(datafull);
            $("#countitem").html(datafull.length)
             $("#getproduct").html(loadproduct(datafull,0,5));
        }
    })
}
$("#searchbutton").click(function(){
    var format = /^[^a-zA-Z0-9]+$/;
    let search = $("#searchSting").val();
    $.session.set('search', $("#searchSting").val());
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"api/ajax-shopsearch",
            data:{
                // categoryId:"null",
                stringsrearch:search,
        },
            success:function(data){
                if(data!=0){
                    console.log(data)
                    $("#countitem").html(data.length)
                    $("#getproduct").html(loadproduct(data,0,5));
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


 


