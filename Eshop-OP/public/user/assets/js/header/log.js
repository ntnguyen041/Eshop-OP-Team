$(document).ready(function(){
    if($.session.get('id')==null){
        $("#nameUser").html("My profile")
        $('#showmenulog').html('<a class="dropdown-item" href="/login">Đăng nhập</a>')
    }
    if($.session.get('IsAdmin')==1){
        $("#nameUser").html($.session.get('name'))
        $('#showmenulog').html('<a class="dropdown-item" id="logout">Đăng xuất</a>'+
        '<a class="dropdown-item" id="deltai" href="#">Thông tin</a>'+
        '<a class="dropdown-item" href="#">Admin</a>')
    }
    if($.session.get('IsAdmin')==0){
        $("#nameUser").html($.session.get('name'))
        $('#showmenulog').html('<a class="dropdown-item" id="logout">Đăng xuất</a>'+
        '<a class="dropdown-item" id="deltai" href="#">Thông tin</a>'
        )
    }
    $("#logout").click(function(){
        $.session.remove('id');
        $.session.remove('IsAdmin');
        $.session.remove('name');
        if($.session.get('id')==null){
            $("#nameUser").html("My profile")
            $('#showmenulog').html('<a class="dropdown-item" href="/login">Đăng nhập</a>')
        }
    })
    $("#deltai").click(function(){
        
    })

})

