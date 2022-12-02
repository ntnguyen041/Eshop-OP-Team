$(document).ready(function(){
    function loadimage(){
        
        let html ="";
        $.ajax({
            type:'GET',
            url:'http://127.0.0.1:8000/api/ajax-shop',
            success:function(data1){
                let a=Math.floor(Math.random() * data1.length);
                let b=Math.floor(Math.random() * data1.length);
                let c=Math.floor(Math.random() * data1.length);
                let d=Math.floor(Math.random() * data1.length);
                html+='<a href="/product/id?'+data1[a].id+'" class="item-thumb"> <img src="http://127.0.0.1:8000/user/assets/images/imageProduct/'+data1[a].Image+'"></a>'+
                '<a href="/product/id?'+data1[b].id+'" class="item-thumb"> <img src="http://127.0.0.1:8000/user/assets/images/imageProduct/'+data1[b].Image+'"></a>'+
                '<a href="/product/id?'+data1[c].id+'" class="item-thumb"> <img src="http://127.0.0.1:8000/user/assets/images/imageProduct/'+data1[c].Image+'"></a>'+
                '<a href="/product/id?'+data1[d].id+'" class="item-thumb"> <img src="http://127.0.0.1:8000/user/assets/images/imageProduct/'+data1[d].Image+'"></a>'
                $(".thumbs-wrap").html(html);
            }
        });
       
        }
        
    var urlParams = new URLSearchParams(window.location.search);
    // ["edit"]
   let str=urlParams.toString(); // "?post=1234&action=edit"
     // "?
     // xu ly chuoi 
     // vi tri dau bang
     let lastindex=str.indexOf('=');
     // mang tim thay trong chuoi
     let stringsearch = str.slice(0,lastindex);
     // nguoi dung ko nhap
    if(!isNaN(stringsearch)){
        $.ajax({
            type:'GET',
            url:'http://127.0.0.1:8000/api/productitem',
            data:{id:stringsearch},
            success:function(data){
                console.log(data)
                if(data==-1){
                    alert('Chúng tôi không tìm thấy sản phẩm này! Shop là nơi chứa nhiều sản phâm có thể bạn cần');
                    window.location.href = "/shop";
                }
                else{
                    $(".img-big-wrap").html('<div><img src="http://127.0.0.1:8000/user/assets/images/imageProduct/'+data[0].Image+'"></div>')
                    $(".deription").html(''+data[0].Description+'');
                    $(".title_type").html(''+data[0].Name+'');
                    $(".price").html(''+data[0].Price+'VND');
                    $("#addCartDetails").html('<button onclick="addcart('+data[0].id+')" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>');

                    loadimage();
                }
               
            }
        });
    }
    else// neu nguoi dung nhap chuoi vao duong dan thì tra lai du lieu can tim
    {
        alert('Hình như bạn đang cố gắng tìm sản phẩm nào đó ! chúng tôi sẽ hướng bạn đến trang sản phẩm để dễ tìm kiếm hơn nhé');
        window.location.href = "/shop";
    }
    

})
