function loadroducthome(data){
    let html="";
    for (let item = 5; item < 10; item++) {
        const element = data[item];
        html+='<div class="col-md col-6">'+
        '<figure class="card-product-grid card-sm">'+
         '<a class="img-wrap"> '+
          '<img src="images/product/'+element.Image+'">'+
         '</a>'+
         '<div class="text-wrap p-3">'+
              '<a href="/product/id?'+element.id+'" class="title">'+element.NNa+'</a>'+
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
          '<a href="/product/id?'+element.id+'" class="btn btn-secondary btn-sm"> Source now </a>'+
        '</div>'+
        '<img src="images/product/'+element.Image+'" height="80" class="img-bg">'+
      '</div>'
    }
    return html;
}
function loadCategoryhome(data){
    let asdasd="";
    $.each(data,function(){
        asdasd+='<li><a>'+$(this)[0].Name+'</a></li>'
    })
    return asdasd;
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
    $.ajax({
        type:'GET',
        url:"api/ajax-category",
        data:{},
        success:function(data){
            $("#Categorylisthome").html(loadCategoryhome(data));
            }
        })
 })
 