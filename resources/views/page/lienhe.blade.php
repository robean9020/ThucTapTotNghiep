@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ với chúng tôi</h2>
					@if(count($errors)>0)
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger">{{$err}}</div> <br>
                        @endforeach
                    @endif
					@if (session('thongbao'))
					<div class="alert alert-success">{{session('thongbao')}}</div>
					@endif
					<div class="space20">&nbsp;</div>
					<form action="lienhe" method="POST" class="contact-form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
						<div class="form-block">
							<input name="Ten" type="text" placeholder="Nhập tên của bạn">
						</div>
						<div class="form-block">
							<input name="Email" type="email" placeholder="Nhập email của bạn">
						</div>
						<div class="form-block">
							<input name="TieuDe" type="text" placeholder="Tiêu đề">
						</div>
						<div class="form-block">
							<textarea name="LienHe" placeholder="Nội dung liên hệ"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi Thông Tin <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<h5 class="other-title">Địa chỉ cơ sở 1</h5>
								<p>
									Số 233 Xã Đàn<br />
									Đống Đa<br />
									Hà Nội
								</p>
					<h5 class="other-title">Địa chỉ cơ sở 2</h5>
								<p>
									Số 186 Lê Thanh Nghị<br />
									Hoàng Mai<br />
									Hà Nội
								</p>
					<div class="space20">&nbsp;</div>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Việc làm</h6>
					<p>
						Chúng tôi luôn tìm kiếm những người tài năng để gia nhập vào công ty. <br>
						<a href="hr@betadesign.com">robean4012@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection