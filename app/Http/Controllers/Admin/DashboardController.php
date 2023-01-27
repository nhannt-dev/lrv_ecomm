<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard() {
        return view('admin.dashboard');
    }

    public function ContactMessage() {
        return view('admin.messages');
    }

    public function CreateCategory()
    {
        return view('admin.createcategory');
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);

        return redirect()->route('admin.allcategory')->with('message','Thêm danh mục sản phẩm thành công!');
    }

    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function EditCategory($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.editcategory', compact('category_info'));
    }

    public function UpdateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        $id = $request->category_id;

        Category::where('id', $id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);

        return redirect()->route('admin.allcategory')->with('message','Cập nhật danh mục sản phẩm thành công!');
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.allcategory')->with('message','Xoá danh mục sản phẩm thành công!');
    }

    public function ActivateCategory(Request $request)
    {
        $id = $request->cat_id;
        Category::where('id', $id)->update([
            'status' => 'active'
        ]);
        
        return redirect()->route('admin.allcategory')->with('message','Đã cập nhật trạng thái danh mục!');
    }
    
    public function DeactivateCategory(Request $request)
    {
        $id = $request->cat_id;
        Category::where('id', $id)->update([
            'status' => 'not active'
        ]);

        return redirect()->route('admin.allcategory')->with('message','Đã cập nhật trạng thái danh mục!');
    }

    public function CreateSubCategory()
    {
        return view('admin.createsubcategory');
    }

    public function StoreSubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
        ]);

        $category_name = Category::where('id', $request->category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'product_count' => 0,
            'category_id' => $request->category_id,
            'category_name' => $category_name
        ]);

        return redirect()->route('admin.allsubcategory')->with('message','Thêm danh mục con thành công!');
    }

    public function AllSubCategory()
    {
        $subcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory', compact('subcategories'));
    }

    public function CreateBrands()
    {
        return view('admin.createbrands');
    }

    public function AllBrands()
    {
        return view('admin.allbrands');
    }
}
