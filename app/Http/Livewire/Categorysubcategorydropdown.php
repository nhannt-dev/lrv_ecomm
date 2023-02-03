<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Categorysubcategorydropdown extends Component
{
    public $categories;
    public $subcategories;
    public $selectcategory = NULL;

    public function mount()
    {
        $this->categories = Category::get();
        $this->subcategories = collect();
    }

    public function render()
    {
        return view('livewire.categorysubcategorydropdown');
    }

    public function updatedSelectCategory($category)
    {
        if (!is_null($category)) {
            $this->subcategories = SubCategory::where('category_id', $category)->get();
        }
    }
}
