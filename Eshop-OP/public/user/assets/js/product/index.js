function loadproduct(data,min,max){
    let html="";
    if(min==-1,max==-1){
        $.each(data,function(){
            // if($(this)[0].Stock>0){
            //   /// con hang  
            // }
            // else{
            //     //het hang
            // }
            html += '<div class="row no-gutters">'+
            '<aside class="col-md-3">'+
                '<a href="#" class="img-wrap">'+
                    '<span class="badge badge-danger"> NEW </span>'+
                    '<img src="user/assets/images/imageProduct/'+$(this)[0].Image+'">'+
                '</a>'+
            '</aside> <!-- col.// -->'+
            '<div class="col-md-6">'+
               ' <div class="info-main">'+
                    '<a href="/product/id?'+$(this)[0].id+'" class="h5 title">'+$(this)[0].Name+'</a>'+
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
                    '<p class="mt-3">'+
                        '<a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>'+
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
                    '<img src="user/assets/images/imageProduct/'+$(this)[item].Image+'">'+
                '</a>'+
            '</aside> <!-- col.// -->'+
            '<div class="col-md-6">'+
               ' <div class="info-main">'+
                    '<a  href="product/id?'+$(this)[0].id+'" class="h5 title">'+$(this)[item].Name+'</a>'+
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
    
                    '<p>'+$(this)[item].Description+'</p>'+
    
                '</div> <!-- info-main.// -->'+
            '</div> <!-- col.// -->'+
            '<aside class="col-sm-3">'+
                '<div class="info-aside">'+
                    '<div class="price-wrap">'+
                        '<span class="h5 price">'+$(this)[item].Price+'VND</span> '+
                        '<small class="text-muted">/per item</small>'+
                    '</div> <!-- price-wrap.// -->'+
                    '<small class="text-warning">Paid shipping</small>'+
                    
                    '<p class="text-muted mt-3">Grand textile Co</p>'+
                    '<p class="mt-3">'+
                        '<a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>'+
                    '</p>'+
                '</div> <!-- info-aside.// -->'+
            '</aside> <!-- col.// -->'+
        '</div> <!-- row.// -->'
            
        }
    }
   
    return html;
}
function loadCategory(data){
    let html="";
    $.each(data,function(){
        html+='<li><button value="'+$(this)[0].id+'" class="btn btn-primary" type="button">'+$(this)[0].Name+'</button>'
    })
    return html;
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
$(document).ready(function(){
    let strings =$.session.get('searchString');
    console.log(strings)
    $("#searchbutton").click(function(){
        var currentLocation = window.location;
        if(currentLocation.href!="http://127.0.0.1:8000/shop"){
            currentLocation.href="/shop";
            $.session.set('searchString',$("#searhSting").val());
        }
    })
    
   
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
        url:"api/ajax-shop",
     
        success:function(data){
            $("#getproduct").html(loadproduct(data,-1,-1));

        }
    })
    $.ajax({
        type:'GET',
        url:"api/ajax-category",
        data:{},
        success:function(data){
            $("#Categorylist").html(loadCategory(data));
        }
    })
    $
})
 