@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$sanpham->name}}</small>
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
                <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            <option value="{{$sanpham->product_type->id}}">{{$sanpham->product_type->name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="TenSanPham" value="{{$sanpham->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="MoTa">{{$sanpham->description}} </textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input class="form-control" name="GiaGoc" value="{{$sanpham->unit_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="GiaKhuyenMai" value="{{$sanpham->promotion_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Anh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <label class="radio-inline">
                            <input name="rdoStatus"
                             @if($sanpham->new == 0)
                                {{'checked'}}
                             @endif
                             value = "0"
                             type="radio">Cũ
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1"
                            @if($sanpham->new ==1)
                                {{'checked'}}
                            @endif
                            type="radio">Mới về
                        </label>
                    </div>


                    <button type="submit" class="btn btn-default">Sửa tin tức</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.endrow -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
