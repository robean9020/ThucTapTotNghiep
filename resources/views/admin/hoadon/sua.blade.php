@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa hóa đơn
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors)>0)
                        @foreach ($errors->all() as $err)
                        <div class="alert alert-danger">{{$err}}</div>
                        @endforeach
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                <form action="admin/hoadon/sua/{{$bill->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" name="Ten" value="{{$bill->customer->name}}" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <label>Ngày đặt hàng</label>
                        <input type="date" class="form-control" name="NgayDatHang" value="{{$bill->date_order}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" name="TongTien" value="{{$bill->total}}"/>
                    </div>
                    <div class="form-group">
                        <label>Hình thức thanh toán</label>
                        <div class="form-group">
                        <label class="radio-inline">
                            <input name="rdoStatus"
                             @if($bill->payment == 0)
                                {{'checked'}}
                             @endif
                             value = "0"
                             type="radio">Tiền mặt
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1"
                            @if($bill->payment ==1)
                                {{'checked'}}
                            @endif
                            type="radio">Chuyển khoản
                        </label>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection