@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type = "hidden" name ="_token" value="{{csrf_token()}}">
				<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ Tên</label>
							<input type="text" id="name" name="name" required>
						</div>

						<div class="form-block">
							<label >Giới Tính</label>
							<input id = "gender" type = "radio" class = "input-radio" name = "gender" value="nam"
							checked="checked" style="width: 10%" ><span style="margin-right: 10%">Nam</span>
							<input id = "gender" type = "radio" class = "input-radio" name = "gender" value="nữ"
							checked="checked" style="width: 10%" ><span style="margin-right: 10%">Nữ</span>
						</div>

						<div class="form-block">
							<label for="email">Email</label>
							<input type="text" id="email" name = "email" required placeholder="robean@gmail.com">
						</div>

						<div class="form-block">
							<label for="address">Địa Chỉ</label>
							<input type="text" name="address" id="adress">
						</div>

						<div class="form-block">
							<label for="phone">Điện thoại</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi Chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn Hàng Của Bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
					<div class="your-order-body" style="padding: 0px 10px">
						<div class="your-order-item">
						</div>
						@if(Session::has('cart'))
						@foreach($product_cart as $product)
							<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']['unit_price']}}</span></span>
											</div>
										</div>
									</div>
								</div>
						@endforeach
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền</p></div>
									<div class="pull-right"><h5 class="color-black"><span class="cart-total-value">{{Session('cart')->totalPrice}}</span></h5></div>
									<div class="clearfix"></div>
								</div>
						@endif
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="payment" value="COD" checked="checked" data-order_button_text="">
										<label for="payment">Thanh toán khi nhận hàng </label>					
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
										<label for="payment">Chuyển khoản </label>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary" href="#">Thanh toán <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
	