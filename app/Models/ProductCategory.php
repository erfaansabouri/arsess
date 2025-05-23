<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
    // parent
    public function parent () {
        return $this->belongsTo(ProductCategory::class , 'parent_id');
    }

    // children
    public function children () {
        return $this->hasMany(ProductCategory::class , 'parent_id');
    }

    // scope parent
    public function scopeParent ( $query ) {
        return $query->whereNull('parent_id');
    }

    // scope children
    public function scopeChildren ( $query ) {
        return $query->whereNotNull('parent_id');
    }

    public static function getMyParentAndSiblingAndChildrenIds ($category) {
        $parent = $category->parent;
        $sibling = @$parent?->children()->where('id' , '!=' , $category->id)->get() ?? [];
        $children = @$category?->children()->get() ?? [];

        // ids
        $ids = [];
        $ids[] = $category->id;
        if ($parent){
            //$ids[] = $parent->id;
        }
        foreach ($sibling as $s) {
            //$ids[] = $s->id;
        }
        foreach ($children as $c) {
            $ids[] = $c->id;
        }
        return $ids;

    }
}
