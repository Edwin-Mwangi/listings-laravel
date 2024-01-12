<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gigs extends Model
{
    use HasFactory;

    // protected $fillable = ['title','email', 'tags', 'website', 'location', 'company', 'description'];

    //to filter gigs based on tags in the url query eg .../?tag='laravel'
    //( we use a scopeFilter) //check Gigscontroller to see filter used
    public function scopeFilter($query, array $filters){
        // dd($filters['tag']); 
        //if the array $filters with var tag exists(gets tags from url)..null coalesece used
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.request('tag').'%');
        }

        //for the search term...orwhere is for where else u want to serch the term
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%'.request('search').'%')
                ->orWhere('description', 'like', '%'.request('search').'%')
                ->orWhere('tags', 'like', '%'.request('search').'%');
        }
    }

    //Relationship with user
    //..check user model
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
