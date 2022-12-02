@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Item</h2>
    <h6><th>Mã HD: {{$invoice->Code}}</th></h6>
    <div class="windown">
        <div class="order-info-content">
            <hr>
            <table class='table'>
                <thead>
                    <tr>
                     
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Tiền</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>

                <form action="{{route('order.details', $invoice->id)}}">
                    <tbody>
                        @foreach($Details as $detail)
                        <tr>
                            
                            <td>{{$detail->product->Name}}</td>
                            <td>{{$detail->product->Price}}</td>
                            <td>{{$detail->Quantity}}</td>
                            <td>{{$detail->UnitPice}}</td>
                        </tr>
                     
                            @endforeach
                    </tbody>

                </form>
            </table>
        </div>
    </div>
</div>
@endsection