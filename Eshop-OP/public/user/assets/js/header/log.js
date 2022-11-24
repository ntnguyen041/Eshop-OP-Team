$(document).ready(function(){
    if($.session.get('id')==null){
        $("#nameUser").html("My profile")
        $('#showmenulog').html('<a class="dropdown-item" href="/login">Đăng nhập</a>'+
        '<a class="dropdown-item" href="/register">Đăng Ký</a>')
    }
    if($.session.get('IsAdmin')==1){
        $("#nameUser").html($.session.get('name'))
        $('#showmenulog').html('<a class="dropdown-item" id="logout">Đăng xuất</a>'+
        '<a class="dropdown-item" id="deltai" href="/TaiKhoan" >Thông tin</a>'+
        '<a class="dropdown-item" href="#">Admin</a>')
    }
    if($.session.get('IsAdmin')==0){
        $("#nameUser").html($.session.get('name'))
        $('#showmenulog').html('<a class="dropdown-item" id="logout">Đăng xuất</a>'+
        '<a class="dropdown-item" id="deltai"  href="/TaiKhoan" >Thông tin</a>'
        )
    }
    $("#logout").click(function(){
       
        $.session.remove('id');
        $.session.remove('IsAdmin');
        $.session.remove('name');
        console.log(params)
        // if(window.location.href!='/'){
        //     window.location.href()
        // }
        if($.session.get('id')==null){
            $("#nameUser").html("My profile")
            $('#showmenulog').html('<a class="dropdown-item" href="/login">Đăng nhập</a>'+
        '<a class="dropdown-item" href="/register">Đăng Ký</a>')
        }
    })
})
 
 
