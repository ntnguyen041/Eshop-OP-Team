@extends('layouts.dashboard')
@section('contentt')
<div class="flex-none w-full max-w-full px-8">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Order</h6>
                
                
                <a href="{{route('admin.order.orderPendingApproval')}}"
                    class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Order pending approval
                    </button> 
                </a>
                <a href="{{route('admin.order.orderApproval')}}"
                    class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Approved Order
                    </button> 
                </a>
                <a href="{{route('admin.order.orderDelivery')}}"
                        class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                           Delivery
                        </button>
                    </a>
                    </div>
                    
                  

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto ps">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Code</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Client</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Time</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Address</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Phone</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <article class="card card-product-list" id="getorder"></article>
                                <tr>
                                    @foreach ($invoices as $invoice)
                                    <td
                                        class="p-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <p style="white-space: normal;"
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 ">
                                                {{$invoice->Code}}</p>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                {{$invoice->account->FullName}}</h6>
                                        </div>

                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{$invoice->IsuedData}}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{$invoice->ShoppingAddress}}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{ $invoice->ShoppingPhone}}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{ $invoice->Total}} </p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:opacity-80"
                                            style="
                                             @if( $invoice->Status == 1)
                                                color: forestgreen;
                                             @endif
                                             @if( $invoice->Status == 0)
                                                color: red;
                                             @endif
                                             @if( $invoice->Status == 2)
                                                color: blue;
                                             @endif
                                             @if( $invoice->Status == 3)
                                                color: orange;
                                             @endif
                                            "
                                        >
                                            
                                            @if( $invoice->Status == 0)
                                                Đang chờ duyệt
                                            @endif
                                            @if( $invoice->Status == 1)
                                                Giao thành công
                                            @endif
                                            @if( $invoice->Status == 2)
                                                đã được duyệt
                                            @endif
                                            @if( $invoice->Status == 3)
                                                đang giao
                                            @endif

                                         </p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <a href="{{route('admin.order.invoiceDetail', $invoice->id)}}"
                                            class="font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection