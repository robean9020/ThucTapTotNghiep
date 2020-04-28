@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/khachhang/sua/{{$khachhang->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger">{{$err}}</div>
                        @endforeach
                    @endif
                    @if(session('notification'))
                        <div class="alert alert-success">{{session('notification')}}</div>
                    @endif
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Name" value="{{$khachhang->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0"
                            @if($khachhang->gender==0)
                                {{"checked"}}
                            @endif
                            type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1"
                            @if($khachhang->gender==1)
                                {{"checked"}}
                            @endif
                            type="radio">Nữ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" value="{{$khachhang->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="DiaChi" value="{{$khachhang->address}}" />
                    </div>
                     <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="SoDienThoai" value="{{$khachhang->phone_number}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection