<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

        Category::findOrFail($id)->update([
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

    public function CreateSubCategory()
    {
        return view('admin.createsubcategory');
    }

    public function AllSubCategory()
    {
        return view('admin.allsubcategory');
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
