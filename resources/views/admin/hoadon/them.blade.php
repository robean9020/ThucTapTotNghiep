@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>Thêm</small>
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
                <form action="admin/hoadon/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <select class="form-control" name="Ten" id="Ten">
                        @foreach($khachhang as $kh)
                            <option value="{{$kh->id}}">{{$kh->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đặt hàng</label>
                        <input type="date" class="form-control" name="NgayDatHang"/>
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" name="TongTien" placeholder="Nhập vào tổng tiền" />
                    </div>
                    <div class="form-group">
                        <label>Hình thức thanh toán</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" checked="" type="radio">Tiền mặt
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" type="radio">Chuyển khoản
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

