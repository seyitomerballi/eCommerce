<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
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
    public function addEditCategory($id = null)
    {
        $adminDetails = Auth::guard('admin')->user();
        if($id == null){
            $title = "Add Category";
        }else{
            $title = "Edit Category";
        }
        $getSections = Section::all();
        return view('admin.categories.add_edit_category',compact('adminDetails','getSections','title'));
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
