
$(document).ready(function(){
    $.ajax({
        type:'GET',
        url:"/ajax-shop",
        data:{},
        success:function(data){
            let html="";
            $.each(data,function(){
                if($(this)[0].Stock>0){
                  /// con hang  
                }
                else{
                    //het hang
                }
                html+='<div class="row no-gutters">'+
                '<aside class="col-md-3">'+
                    '<a href="#" class="img-wrap">'+
                        '<span class="badge badge-danger"> NEW </span>'+
                        '<img src="user/assets/images/imageProduct/'+$(this)[0].Image+'">'+
                    '</a>'+
                '</aside>  '+
                '<div class="col-md-6">'+
                    '<div class="info-main">'+
                        '<a href="#" class="h5 title">'+$(this)[0].Name+'</a>'+
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
        
                        '<p>'+$(this)[0].Description+' </p>'+
        
                    '</div>'+
                '</div> <!-- col.// -->'+
                '<aside class="col-sm-3">'+
                    '<div class="info-aside">'+
                        '<div class="price-wrap">'+
                            
                            '<span class="h5 price">$'+$(this)[0].Price+'</span> '+
                        '</div>'+
                        
                        '<p class="mt-3">'+
                            '<p></p>'
                            '<a href="#" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Contact supplier </a>'+
                             
                        '</p>'+
                    '</div> <!-- info-aside.// -->'+
                '</aside> <!-- col.// -->'+
            '</div>'
            })

            $("#getproduct").html(html);

            
            
        }
    })
})