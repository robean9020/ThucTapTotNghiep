@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
            </div>

            @if(session('thongbaoxoa'))
                <div class="alert alert-success">{{session('thongbaoxoa')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Tình trạng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanpham as $sp)
                    <tr class="even gradeC" align="center">
                        <td>{{$sp->id}}</td>
                        <td>{{$sp->name}}</td>
                        <td>{{$sp->product_type->name}}</td>
                        <td>{{$sp->description}}</td>
                        <td><img src="source/image/product/{{$sp->image}}" width="100px"></td>
                        <td>
                            @if($sp->new==0)
                            {{"Cũ"}}
                            @else
                            {{"Hàng mới về"}}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection