$(document).ready(function(){
   
    $.ajax({
        url:'/api/loadaccount',
        type:'GET',
        success:function(data){
             $("#loadAccount").html(loadaccount(data))
        }
    })
   
   
})
function checkadmin(e){
    console.log(e);
}
function checkstatus(e){
    console.log(e);
}
function loadaccount(data){
    let html=""
    $.each(data,function(){
        html+='<tr>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<div class="flex px-2 py-1">'+
                '<div class="flex flex-col justify-center"><h6 class="mb-0 text-sm leading-normal dark:text-white">'+$(this)[0].id+'</h6></div>'+
            '</div>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<p style="white-space: normal;" class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 ">'+$(this)[0].Username+'</p>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Password+'</p>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           ' <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Email+'</p>'+
       ' </td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Phone+'</p>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
           ' <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].Address+'</p>'+
        '</td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">'+$(this)[0].FullName+'</p>'+
        '</td>'+
        '<td  class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'
        if($(this)[0].IsAdmin==1){
        html+=('<input onchange="checkadmin('+$(this)[0].id+$(this)[0].IsAdmin+')" type="checkbox"  value="'+$(this)[0].id+'"checked>')
        }
        else{
            html+=('<input onchange="checkadmin('+$(this)[0].id+$(this)[0].IsAdmin+')" class="isad" type="checkbox"  value="'+$(this)[0].id+'">')
        }
        html+='</td>'+
        '<td  class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'
        if($(this)[0].Status==1){
            html+=('<input id="status" onchange="checkstatus('+$(this)[0].id+$(this)[0].Status+')" type="checkbox"  value="'+$(this)[0].id+'"checked>')
            }
            else{
                html+=('<input id="status" onchange="checkstatus('+$(this)[0].id+$(this)[0].Status+')" type="checkbox"  value="'+$(this)[0].id+'">')
            }
            html+=
         
       
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<img src="user/assets/images/imageProduct/'+$(this)[0].Avatar+' " style="height:100px; width:100px"></td>'+
        '<td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">'+
            '<a class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">'+
                '<button value="1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">Edit</button>'+
            '</a>'+
            '<div><button value="1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button></div>'+
        '</td>'+
    '</tr>'

     })
    return html;
}