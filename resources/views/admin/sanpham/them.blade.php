@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                        @foreach($loaisanpham as $lsp)
                            <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="TenSanPham" placeholder="Nhập vào tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="MoTa"> </textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input class="form-control" name="GiaGoc" placeholder="Nhập vào giá gốc" />
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="GiaKhuyenMai" placeholder="Nhập vào giá khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Anh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" checked="" type="radio">Cũ
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" type="radio">Mới về
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data); 
                });
            });
        });
    </script>
@endsection