@extends('layouts.dashboard')
@section('contentt')
<div class="flex-none w-full max-w-full px-8">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-8 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">FullName</label>
                        <input  type="text"   id="FullName"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Username</label>
                        <input  type="text"   id="Username"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
         
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Password</label>
                        <input  type="text"   id="Password"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Email</label>
                        <input type="text"  id="Email"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Phone</label>
                        <input  type="text"   id="Phone"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Addess</label>
                        <input type="text"   id="Addess"class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <Span id="errcreate"></Span>
 
                    <img src="{{asset('/user/assets/images/avatars/h2.jpg')}}"
                    <div id="imagea" class="mb-6 ">
                       
                        {{-- <label for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input id="Image" type="file" name="Image" id="small-input" class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                    </div>
                    <input type="button" value="Edit" id="edit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 ">
                    </input>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('user/assets/js/dashboard/account/edit.js')}}"></script>
@endsection