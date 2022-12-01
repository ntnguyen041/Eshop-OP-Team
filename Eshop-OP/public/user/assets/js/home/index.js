function loadroducthome(data){
    let html="";
    for (let item = 5; item < 10; item++) {
        const element = data[item];
        html+='<div class="col-md col-6">'+
        '<figure class="card-product-grid card-sm">'+
         '<a href="#" class="img-wrap"> '+
          '<img src="images/product/'+element.Image+'">'+
         '</a>'+
         '<div class="text-wrap p-3">'+
              '<a href="#" class="title">'+element.NNa+'</a>'+
              '<span class="badge badge-danger"> '+element.Price+' </span>'+
         '</div>'+
      '</figure>'+
    '</div>'
    }
    return html;
}

function loadroducthome2(data){
     
    let html="";
    for (let item = 2; item < 5; item++) {
        const element = data[item];
        html+=' <div class="card-banner border-bottom">'+
        '<div class="py-3" style="width:80%">'+
          '<h6 class="card-title">'+element.NNa+'</h6>'+
          '<a href="#" class="btn btn-secondary btn-sm"> Source now </a>'+
        '</div>'+
        '<img src="images/product/'+element.Image+'" height="80" class="img-bg">'+
      '</div>'
    }
    return html;
}
$(document).ready(function(){
    $.ajax({
        type:'GET',
        url:"api/ajax-shop",
        data:{},
        success:function(data){
            $("#getproducthome").html(loadroducthome(data));
            $("#loadroducthome2").html(loadroducthome2(data));
        }
    })
 })
 