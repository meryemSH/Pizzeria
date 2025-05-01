<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Livewire\Component;

class FilterBlogsByCategory extends Component
{
    public $selectedCategorie;
    public $blogs;

    public function mount()
    {
        $this->selectedCategorie = '';
        $this->blogs = Blog::all();
    }


    public function filterByCategorie()
    {
        if ($this->selectedCategorie) {
            $this->blogs = Blog::where('category_blog_id', $this->selectedCategorie)->get();
        } else {
            $this->blogs = Blog::all();
        }
    }


    public function render()
    {
        return view('livewire.filter-blogs-by-category', [
            'categories' => CategoryBlog::where('is_enabled' , true)->get(),
        ]);
    }
}
