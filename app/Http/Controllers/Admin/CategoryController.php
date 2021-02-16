<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function categories()
    {
        $adminDetails = Auth::guard('admin')->user();
        Session::put('page','categories');
        $categories = Category::all();
        //dd($categories->toArray());

        return view('admin.categories.categories',compact('adminDetails','categories'));
    }
    public function updateCategoryStatus()
    {

        if(request()->ajax()){
            $data = request()->all();
            if($data['status'] === "Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            $responseData = ['status'=>$status,'category_id'=>$data['category_id']];
            return response()->json($responseData);
        }

        /*
        $data = $request->all();
        echo "<pre>"; print_r($data); die;
        */
    }
}
