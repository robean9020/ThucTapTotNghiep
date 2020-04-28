@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>{{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger">{{$err}}</div> <br>
                        @endforeach
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên Tài Khoản</label>
                        <input class="form-control" name="Ten" value="{{$user->full_name}}" />
                    </div>
                     <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="DiaChi" value="{{$user->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="SoDienThoai"  value="{{$user->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu mới" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection