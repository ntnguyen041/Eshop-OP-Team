@extends('layouts.dashboard')
@section('contentt')
<div class="flex-none w-full max-w-full px-8">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="px-8 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-3 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h4 class="dark:text-white">Invoice Detail: {{$invoice->Code}}</h4>
                    <h6>KH: {{$invoice->account->FullName}}</h6>

                </div>
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Product
                            </th>
                            <th
                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Price
                            </th>
                            <th
                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Quantity
                            </th>
                            <th
                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Price
                            </th>

                        </tr>
                    </thead>
                    @foreach($invoiceDetails as $invoiceDetail)
                    <tbody>
                        <td
                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                {{$invoiceDetail->product->Name}}</p>
                        </td>
                        <td
                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                {{$invoiceDetail->product->Price}}</p>
                        </td>
                        <td
                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                {{$invoiceDetail->Quantity}}</p>
                        </td>
                        <td
                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                {{$invoiceDetail->UnitPice}}</p>
                        </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{route('admin.order.index')}}"
                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded">
                    Back All Order
                </button>
            </a>
        </div>
    </div>
</div>
@endsection