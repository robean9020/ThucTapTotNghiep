<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function getDanhSach(){
    	$sanpham = Product::all();
    	return view('admin.sanpham.danhsach',compact('sanpham'));
    }

    public function getThem(){
    	$loaisanpham = ProductType::all();
    	return view('admin.sanpham.them',compact('loaisanpham'));
    }

    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'TenSanPham'=>'required|min:3|max:100|unique:products,name',
    			'MoTa' => 'required|min:10|max:200',
    			'GiaGoc' => 'required|numeric',
    			'GiaKhuyenMai' => 'numeric',
    			'Anh'=> 'image|mimes:jpg,png,jpeg'
    		],
    		[
    			'TenSanPham.required' => 'Bạn chưa nhập tên sản phẩm',
    			'MoTa.required' => 'Bạn chưa nhập mô tả',
    			'TenSanPham.min' =>"Tên sản phẩm phải lớn hơn 3 ký tự",
    			'TenSanPham.max' => 'Tên sản phẩm không được lớn hơn 100 ký tự',
    			'TenSanPham.unique' => 'Sản phẩm đã tồn tại',
    			'GiaGoc.required' =>'Bạn chưa nhập giá sản phẩm',
    			'GiaGoc.numeric' => 'Giá phải là số',
    			'GiaKhuyenMai.numeric' => 'Giá khuyến mãi phải là số',
    			'Anh.mimes' => 'Bạn phải upload file ảnh'
    		]);
    	$sanpham = new Product;
    	$sanpham->name = $request->TenSanPham;
    	$sanpham->description = $request->MoTa;
    	$sanpham->id_type = $_POST['TheLoai'];
    	$sanpham->unit_price = $request->GiaGoc;
    	if (!empty($_POST['GiaKhuyenMai'])){
    		 $sanpham->promotion_price = $request->GiaKhuyenMai;
    	}
    	else{
    		$sanpham->promotion_price = 0;
    	}
    	$radioChecked = $_POST['rdoStatus'];
    	if($radioChecked == "0"){
    		$sanpham->new = 0;
    	}
    	elseif ($radioChecked == "1") {
    		$sanpham->new = 1;
    	}
    	if($request->hasFile('Anh')){
    		$file = $request->file('Anh');
    		$name = $file->getClientOriginalName();
    		$saveName = Str::random(4). "_" .$name;
    		while(file_exists("source/image/product/".$saveName)){
    			$saveName = Str::random(4) . "_" . $name;
    		}
    		$file->move("source/image/product",$saveName);
    		$sanpham->image = $saveName;
    	}
    	else{
    		$sanpham->image = "";
    	}
    	$sanpham->save();
    	return redirect("admin/sanpham/them")->with('thongbao','Bạn đã thêm thành công!');
	}

    public function getSua($id){
        $loaisanpham = ProductType::all();
        $sanpham = Product::find($id);
        return view ('admin.sanpham.sua',compact('loaisanpham','sanpham'));
    }

    public function postSua($id, Request $request){
        $this->validate($request,
    		[
    			'TenSanPham'=>'required|min:3|max:100',
    			'MoTa' => 'required|min:10|max:200',
    			'GiaGoc' => 'required|numeric',
    			'GiaKhuyenMai' => 'numeric',
    			'Anh'=> 'image|mimes:jpg,png,jpeg'
    		],
    		[
    			'TenSanPham.required' => 'Bạn chưa nhập tên sản phẩm',
    			'MoTa.required' => 'Bạn chưa nhập mô tả',
    			'TenSanPham.min' =>"Tên sản phẩm phải lớn hơn 3 ký tự",
    			'TenSanPham.max' => 'Tên sản phẩm không được lớn hơn 100 ký tự',
    			'GiaGoc.required' =>'Bạn chưa nhập giá sản phẩm',
    			'GiaGoc.numeric' => 'Giá phải là số',
    			'GiaKhuyenMai.numeric' => 'Giá khuyến mãi phải là số',
    			'Anh.mimes' => 'Bạn phải upload file ảnh'
    		]);
        $sanpham = Product::find($id);
    	$sanpham->name = $request->TenSanPham;
    	$sanpham->description = $request->MoTa;
    	$sanpham->id_type = $_POST['TheLoai'];
    	$sanpham->unit_price = $request->GiaGoc;
    	if (!empty($_POST['GiaKhuyenMai'])){
    		 $sanpham->promotion_price = $request->GiaKhuyenMai;
    	}
    	else{
    		$sanpham->promotion_price = 0;
    	}
    	$radioChecked = $_POST['rdoStatus'];
    	if($radioChecked == "0"){
    		$sanpham->new = 0;
    	}
    	elseif ($radioChecked == "1") {
    		$sanpham->new = 1;
    	}
    	if($request->hasFile('Anh')){
    		$file = $request->file('Anh');
    		$name = $file->getClientOriginalName();
    		$saveName = Str::random(4). "_" .$name;
    		while(file_exists("source/image/product/".$saveName)){
    			$saveName = Str::random(4) . "_" . $name;
    		}
    		$file->move("source/image/product",$saveName);
    		$sanpham->image = $saveName;
    	}
    	$sanpham->save();
    	return redirect("admin/sanpham/sua/".$id)->with('thongbao','Bạn đã sửa thành công!');
    }

    public function getXoa($id){
        $sanpham = Product::find($id);
        $sanpham->delete();
        return redirect("admin/sanpham/danhsach")->with("thongbaoxoa","Bạn đã xóa thành công");
    }
}
