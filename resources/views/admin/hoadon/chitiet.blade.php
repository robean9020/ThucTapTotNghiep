@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết hóa đơn
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
                <form action="admin/hoadon/danhsach" method="GET">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @foreach($billdetail as $bl)
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="Ten" value="{{$bl->quantity}}" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <label>Đơn giá</label>
                        <input class="form-control" name="NgayDatHang" value="{{$bl->unit_price}}"/>
                    </div>
                    @endforeach            
                    <button type="submit" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection