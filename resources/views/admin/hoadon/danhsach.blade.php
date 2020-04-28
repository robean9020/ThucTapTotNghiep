@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý
                    <small>Hóa đơn</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill as $b)
                    <tr class="odd gradeX" align="center">
                        <td>{{$b->id}}</td>
                        <td>{{$b->customer->name}}</td>
                        <td>{{$b->date_order}}</td>
                        <td>{{$b->total}}</td>
                         <td>
                            @if($b->payment==0)
                            {{"Tiền mặt"}}
                            @else
                            {{"Chuyển khoản"}}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoa/{{$b->id}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/sua/{{$b->id}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="admin/hoadon/chitiet/{{$b->id}}">Xem</a></td>
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