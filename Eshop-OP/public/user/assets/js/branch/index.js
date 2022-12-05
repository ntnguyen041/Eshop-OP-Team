function loadbrand(data) {
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
        ' <a href="{{route(admin.brand.edit, '+$(this)[0].Name.id+')}}"'+
        ' class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
        ' <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">'+
        '     Edit'+
        ' </button>'+
        ' </a>'+
      //
        '<a href="http://127.0.0.1:8000/admin/brand/?id " '+$(this)[0].Name.id+')}}" class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
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
    // alert('chúng tôi không thể tìm thấy thương hiệu này')
    if(!search.match(format)){
        $.ajax({
            type:'GET',
            url:"http://127.0.0.1:8000/api/ajax-search_brands",
            data:{
                stringsearch: search
        },
            success:function(data){
                console.log(data)
                if(data!=null){
                    // $("#countitem").html(data.length)
                    $("#loadBranch").html(loadbrand(data));
                }
                else{
                    alert('chúng tôi không thể tìm thấy thương hiệu này')
                }
            }
        })
    }
    else{
        alert('chúng tôi không thể tìm thấy tài khoản này')
    }
})