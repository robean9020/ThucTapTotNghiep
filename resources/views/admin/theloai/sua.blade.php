@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>{{$theloai->Ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/theloai/sua/{{$theloai->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if (count($errors)>0)
                        @foreach ($errors->all() as $err)
                        <div class="alert alert-danger">{{$err}}</div>
                        @endforeach
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="Ten" value="{{$theloai->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="MoTa">{{$theloai->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Anh" class="form-control">
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