@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giới thiệu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Giới thiệu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">Lịch sử của chúng tôi</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation">
						<a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2003</span></a>
						<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2004</span></a>
						<a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2005</span></a>
						<a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2007</span></a>
						<a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2009</span></a>
						<a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2011</span></a>
						<a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2014</span></a>
					</div>

					<div class="history-slides">
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
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
							</div>
							</div> 
						</div>
					</div>
				</div>
			</div>

			<div class="space50">&nbsp;</div>
			<hr />
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection