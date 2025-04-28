<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductForm extends Component
{
    public $name, $model, $description, $category_id, $brand_id;
    public $categories, $brands;

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Product::create([
            'name' => $this->name,
            'model' => $this->model,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'stock' => 0,
        ]);

        session()->flash('message', 'Product added successfully!');
        $this->reset();
    }

    public function close()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
