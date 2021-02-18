<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    public function categories()
    {
        Session::put('page', 'categories');
        $categories = Category::with(['section','parent_category'])->get();
        /*
        $categories = Category::with(['section' => function ($query) {
            $query->select('id', 'name');
        }, 'parent_category' => function ($query) {
            $query->select('id', 'category_name', 'slug');
        }])->get();
*/
        //dd($categories->toArray());
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function addEditCategory($id = null)
    {
        if ($id == null) {
            // Add Category Functionality
            $title = "Add Category";
            $message_object = 'success_message_add_category';
            $message = 'Kategori başarıyla eklendi!';
            $category = new Category();
            $categoryData = array();
            $getCategories = array();

        } else {
            // Edit Category Functionality
            $title = "Edit Category";
            $message_object = 'success_message_add_category';
            $message = 'Kategori başarıyla güncellendi!';
            $categoryData = Category::where('id',$id)->first();
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$categoryData->section_id])->get();
            $category = Category::findOrFail($id);
            //dd($categoryData);
            //dd($getCategories);
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
            $this->validate(request(), $rules);

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
            if(empty($data['category_discount'])){
                $data['category_discount'] = "";
            }
            if(empty($data['category_description'])){
                $data['category_description'] = "";
            }
            if(empty($data['category_meta_title'])){
                $data['category_meta_title'] = "";
            }
            if(empty($data['category_meta_description'])){
                $data['category_meta_description'] = "";
            }
            if(empty($data['category_meta_keywords'])){
                $data['category_meta_keywords'] = "";
            }
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
            $category->save();
            session::flash($message_object,$message);
            return redirect(route('admin.categories.categories'));
        }

        // get all sections
        $getSections = Section::all();
        return view('admin.categories.add_edit_category')->with(compact('getSections', 'title','categoryData','getCategories'));
    }

    public function deleteCategoryImage($id)
    {
        // Get Category Image
        $categoryImage = Category::select('category_image')->where('id',$id)->first();
        // Get Category Image Path
        $categoryImagePath = 'images/category_images/category_photos_';
        // Delete Category Image from category_images folder if exists
        if(file_exists($categoryImagePath . $categoryImage)){
            unlink($categoryImagePath . $categoryImage);
        }

        // Delete Category Image from database category table
        Category::where('id',$id)->update(['category_image'=>'']);
        return redirect()->back()->with('flash_message_success','Kategori resmi başarılı bir şekilde silindi!');
    }
    public function appendCategoryLevel()
    {
        if (request()->ajax()) {
            $data = request()->all();
            $getCategories = Category::with('subcategories')->where(['section_id' => $data['category_section_id'], 'parent_id' => 0, 'status' => 1])->get();
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
