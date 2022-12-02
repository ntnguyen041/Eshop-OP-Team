$(document).ready(function(){
    let id=$.session.get('editid');
    $.ajax({
        url:'http://127.0.0.1:8000/api/user',
        type:'get',
        data:{id:id},
        success:function(data){
            console.log(data.Avatar);
            $("#FullName").val(data.FullName);
            $("#Username").val(data.Username);
            $("#Password").val(data.Password);
            $("#Email").val(data.Email);
            $("#Phone").val(data.Phone);
            $("#Addess").val(data.Address);
            $("#imagea").html('<img src="{{asset(user/assets/images/avatars/'+data.Avatar+')}}" alt="'+data.Avatar+'"> <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label><input id="Image" value="'+data.Avatar+'" type="file" name="Image" id="small-input" class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">');
        }
       })
       
  
   
})