<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * @param Category $category
     */
    public function creating(Category $category) {
        $category->name = ucwords($category->name);
    }

    /**
     * @param Category $category
     */
    public function updating(Category $category) {
        $category->name = ucwords($category->name);
    }
}
