<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class CategoryController extends Controller
{
    public function categories()
    {
        Session::put('page', 'categories');
        $categories = Category::all();
        //dd($categories->toArray());

        return view('admin.categories.categories', compact('categories'));
    }

    public function addEditCategory($id = null)
    {
        if ($id == null) {
            $title = "Add Category";
            $category = new Category();
        } else {
            $title = "Edit Category";
        }

        if (request()->isMethod('post')) {
            $data = request()->all();
            //dd($data);
            // Category Validations
            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'category_section_id' => 'required',
                'category_slug' => 'required',
                'category_image' => 'image',
            ];
            $this->validate(request(),$rules);
            $category->parent_id = $data['category_parent_id'];
            $category->section_id = $data['category_section_id'];
            $category->slug = $data['category_slug'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['category_description'];
            $category->meta_title = $data['category_meta_title'];
            $category->meta_description = $data['category_meta_description'];
            $category->meta_keywords = $data['category_meta_keywords'];
            $category->status = 1;
            // Upload Category Image
            if (request()->hasFile('category_image')) {
                $image_temp = request()->file('category_image');
                if ($image_temp->isValid()) {
                    // get image extension
                    $extension = $image_temp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = rand(111, 1999999999) . '.' . $extension;
                    $imagePath = 'images/category_images/category_photos_' . $imageName;
                    // Upload the image
                    Image::make($image_temp)->save($imagePath);
                    $category->category_image = $imageName;
                }
            }
            $category->save();
            session::flash('success_message_add_category', 'Kategori başarıyla eklendi!');
            return redirect(route('admin.categories.categories'));
        }

        // get all sections
        $getSections = Section::all();
        return view('admin.categories.add_edit_category', compact('getSections', 'title'));
    }

    public function appendCategoryLevel()
    {
        if(request()->ajax()){
            $data = request()->all();
            $getCategories = Category::with('subcategories')->where(['section_id'=>$data['category_section_id'],'parent_id' => 0,'status'=>1])->get();
            //dd($getCategories);
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }
    public function updateCategoryStatus()
    {

        if (request()->ajax()) {
            $data = request()->all();
            if ($data['status'] === "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            $responseData = ['status' => $status, 'category_id' => $data['category_id']];
            return response()->json($responseData);
        }

        /*
        $data = $request->all();
        echo "<pre>"; print_r($data); die;
        */
    }
}
