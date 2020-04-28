<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Illuminate\Support\Str;

class BillController extends Controller
{
    //
    public function getDanhSach(){
    	$bill = Bill::all();
    	return view('admin.hoadon.danhsach',compact('bill'));
    }

    public function getThem(){
    	$bill = Bill::all();
    	 $khachhang = Customer::all();
    	return view('admin.hoadon.them',compact('bill','khachhang'));
    }

    public function postThem(Request $request){
        $this->validate($request,
    		[
    			'NgayDatHang' => 'required|date_format:Y-m-d',
    			'TongTien' => 'required|numeric'
    		],
    		[
    			'NgayDatHang.required' => 'Bạn chưa chọn ngày',
    			'TongTien.required' => 'Bạn chưa nhập tổng tiền',
    			'TongTien.numeric' =>"Tổng tiền nhập phải là số",
    		]);
        $bill = new Bill;
        $bill->id_customer = $_POST['Ten'];
    	$bill->date_order = $request->NgayDatHang;
    	$bill->total = $request->TongTien;
    	$radioChecked = $_POST['rdoStatus'];
    	if($radioChecked == "0"){
    		$bill->payment = 0;
    	}
    	elseif ($radioChecked == "1") {
    		$bill->payment = 1;
    	}
    	$bill->save();
    	return redirect("admin/hoadon/them/")->with('thongbao','Bạn đã thêm thành công!');
	}

    public function getSua($id){
        $bill = Bill::find($id);
        return view ('admin.hoadon.sua',compact('bill'));
    }

    public function postSua($id, Request $request){
        $this->validate($request,
    		[
    			'NgayDatHang' => 'required|date_format:Y-m-d',
    			'TongTien' => 'required|numeric'
    		],
    		[
    			'NgayDatHang.required' => 'Bạn chưa chọn ngày',
    			'TongTien.required' => 'Bạn chưa nhập tổng tiền',
    			'TongTien.numeric' =>"Tổng tiền nhập phải là số",
    		]);
        $bill = Bill::find($id);
    	$bill->date_order = $request->NgayDatHang;
    	$bill->total = $request->TongTien;
    	$radioChecked = $_POST['rdoStatus'];
    	if($radioChecked == "0"){
    		$bill->payment = 0;
    	}
    	elseif ($radioChecked == "1") {
    		$bill->payment = 1;
    	}
    	$bill->save();
    	return redirect("admin/hoadon/sua/".$id)->with('thongbao','Bạn đã sửa thành công!');
    }

    public function getXoa($id){
        $bill = Bill::find($id);
        $bill->delete();
        return redirect("admin/hoadon/danhsach")->with("thongbaoxoa","Bạn đã xóa thành công");
    }

    public function getChiTiet($id){
    	$billdetail = BillDetail::where("id_bill",$id)->get();
    	return view('admin.hoadon.chitiet',compact('billdetail'));
    }
}
