@extends('layouts.app')

@section('content')
<div class="container">
  <div class="windown">
    <div class="order-info-content">
    
      <hr>
      <div class="row">
          <div class="col-md">Mã đơn hàng</div>
          <div class="col-md">Ngày tháng đặt hàng</div>
          <div class="col-md">Địa chỉ</div>
          <div class="col-md">Số điện thoại</div>
          <div class="col-md">Tiền</div>
          <div class="col-md">Trạng thái</div>
          <div class="col-md">Action</div>
      </div> 

      <tbody>
        <tr>
        <ul class="list-menu" id="Invoicelist">
				
          </ul>
          
        </tr>
        </tbody>
    
    </div>
    
  </div>
</div>
<script src="{{asset('user/assets/js/invoice/index.js')}}"></script>
<script src="{{asset('user/assets/js/cart/order.js')}}"></script>
@endsection


