@extends('layouts.app')

@section('content')

<div class="container">
  <div class="windown">
    <div class="order-info-content">
    
      <hr>
      <div class="row">
          <div class="col-md">Mã đơn hàng</div>
          <div class="col-md">Sản phẩm</div>
          <div class="col-md">Số lượng</div>
          <div class="col-md">Tổng tiền</div>
      </div> 

      <tbody>
        <tr>
       
          
        </tr>
        </tbody>
    
    </div>
    
  </div>
</div>
<script src="{{asset('user/assets/js/invoice/index.js')}}"></script>
@endsection