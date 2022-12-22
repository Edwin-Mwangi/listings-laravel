<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gigs extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        // dd($filters['tag']);
        //if the array $filters with var tag exists..null coalesece used
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.request('tag').'%');
        }
    }
}
