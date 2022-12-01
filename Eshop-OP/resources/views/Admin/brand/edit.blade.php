@extends('layouts.dashboard')
@section('contentt')
<div class="flex-none w-full max-w-full px-8">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-8 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <form action="{{route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-6">Name Brand</label>
                        <input type="text" name="Name" value="{{$brand->Name}}" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('Name')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" name="Description" value="{{$brand->Description}}" id="small-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('Description')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 ">

                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection