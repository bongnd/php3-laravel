<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// php artisan migrate
class ProductController extends Controller
{
//   public  function index(){
    //câu 1 Lấy danh sách toàn bộ user
    // $result= DB::table('users')->get();
    //câu 2 Lấy thông tin user có id = 4
    // $result= DB::table('users')->where('id', '=','4')->first();
    // dd($result);
//     
//
// 3. Lấy thuộc tính 'name' của user có id = 16
    // $result = DB::table('users')->where('id','=', '16')->value('name');
    // dd($result);

// 4. Lấy danh sách id của phòng ban 'Ban giám hiệu'
    // $id_pb= DB::table('phongban')->where('ten_donvi', 'like', 'Ban giám hiệu')->pluck('id');
    // $result= DB::table('users')->where('phongban_id', $id_pb)->get();
    // dd($result);

// 5. Tìm user có độ tuổi lớn nhất trong công ty
        // $tuoi= DB::table('users')->max('tuoi');
        // $result= DB::table('users')->where('tuoi',$tuoi)->get();
        // dd($result);

// 6. Tìm user có độ tuổi nhỏ nhất trong công ty
//  $tuoi= DB::table('users')->min('tuoi');
//         $result= DB::table('users')->where('tuoi',$tuoi)->get();
//         dd($result);
// 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
    // $id_pb= DB::table('phongban')->where('ten_donvi', 'like', 'Ban giám hiệu')->pluck('id');
    // $result= DB::table('users')->where('phongban_id', $id_pb)->count();
    // dd($result);
// 8. Lấy danh sách tuổi các user
        // $result= DB::table('users')->pluck('tuoi');
        // dd($result);
// 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result= DB::table('users')->where('name', 'like', '%Khải%')->orWhere('name','like', '%Thanh%')->get();
        // dd($result);
// 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
    //       $id_pb= DB::table('phongban')->where('ten_donvi', 'like', 'Ban đào tạo')->pluck('id');
    // $result= DB::table('users')->where('phongban_id', $id_pb)->get();
    // dd($result);
// 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result= DB::table('users')->where('tuoi', '>=' ,'30')->orderBy('tuoi', 'asc')->get();
        // dd($result);
// 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result= DB::table('users')->orderBy('tuoi', 'desc')->offset(5)->limit(10)->get();
        // dd($result);
// 13. Thêm một user mới vào công ty
        // $data=[
        //         'name' => 'Nguyễn Đình Bổng',
        //         'email' => 'bogn@gmail.com',
        //         'phongban_id' => '1',
        //         'songaynghi' => '0',
        //         'tuoi' => '19',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),


        // ];
        //     DB::table('users')->insert($data);
// 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
    //     $id_pb= DB::table('phongban')->where('ten_donvi', 'like', 'Ban giám hiệu')->pluck('id');
    // $list= DB::table('users')->where('phongban_id', $id_pb)->get();

    // foreach($list as $hi){
    //         DB::table('users')->where('id', $hi->id)
    //         ->update([
    //                 'name' => $hi->name . 'PĐT'
    //         ]);
    // }
// 15. Xóa user nghỉ quá 15 ngày
// DB::table('users')->where('songaynghi', '>', '15')->delete();


public function list(){
    $products= DB::table('products')->select('products.*', 'categories.name as cate_name')
    ->join('categories', 'categories.id','=','products.category_id')->get();
    // dd($products);
    return view('products/list-products', compact('products'));
}

public function addProducts(){
    $category= DB::table('categories')->select('categories.*')->get();
    return view('products/add-products', compact('category'));
}
public function store(Request $re){
    //php artisan storage:link
    $path=null;
    $file=$re->file('img');
    if($file){
        //Đổi tên
        $fileName= time() . "_" . $file->getClientOriginalName();
      $path=  $file->storeAs('upload',$fileName,'public');

    }
    $data=[
        'name'=> $re->name,
        'category_id'=>$re->category_id,
        'price'=> $re->price,
        'description'=>$re->description,
        'isHot'=>$re->isHot ? "1" : "0",
        'img'=>$path
    ];
    DB::table('products')->insert($data);
    return redirect()->route('products.list-products');
}

public function deletePro($id){
    DB::table('products')->where('id', $id)->delete();
    return redirect()->route('products.list-products');
}
public function edit($id){
    $category = DB::table('categories')->select('categories.*')->get();
    $product = DB::table('products')->where('id', $id)->first();
    return view('products/update-products', compact('category', 'product'));

}
 public function update($id, Request $re){
    $path=DB::table('products')->find($id)->img;
    $file=$re->file('img');
    if($file){
        //xóa
        if($path!=null){
            Storage::disk('public')->delete($path);
        }
        //Đổi tên
        $fileName= time() . "_" . $file->getClientOriginalName();
      $path=  $file->storeAs('upload',$fileName,'public');
    }

    $data=[
        'name'=> $re->name,
        'category_id'=>$re->category_id,
        'price'=> $re->price,
        'description'=>$re->description,
        'isHot'=>$re->isHot,
        'img'=>$path

    ];
    DB::table('products')->where('id', $re->id)->update($data );
    return redirect()->route('products.list-products');
 } 
//   }
 }
