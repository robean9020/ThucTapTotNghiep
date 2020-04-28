@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="container">
		        <div class="row">
		            <div class="col-md-4 col-md-offset-4">
		                <div class="login-panel panel panel-default">
		                    @if(count($errors)>0)
		                        @foreach($errors->all() as $err)
		                            <div class="alert alert-danger">{{$err}}</div> <br>
		                        @endforeach
		                    @endif
		                    @if (session('thongbao'))
		                        <div class="alert alert-danger">{{session('thongbao')}}</div>
		                    @endif
		                    <div class="panel-heading">
		                        <h3 class="panel-title">Mời bạn đăng nhập</h3>
		                    </div>
		                    <div class="panel-body">
		                        <form role="form" method="POST" action="admin/dangnhap">
		                            <input type="hidden" name="_token" value="{{csrf_token()}}">
		                            <fieldset>
		                                <div class="form-group">
		                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
		                                </div>
		                                <div class="form-group">
		                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
		                                </div>
		                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
		                            </fieldset>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
    		</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection