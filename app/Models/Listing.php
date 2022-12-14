<?php
namespace App\Models;

//model created manually 
// the model is then used in the route file

class Listing {
    public static function all(){
        return [
            ['id'=>1,'type'=>'veg','base'=>'garlic crust'],
            ['id'=>2,'type'=>'volcano','base'=>'cheesy crust'],
            ['id'=>3,'type'=>'hawaiian','base'=>'thin & crusty']
        ];
    }

    //to show listing based on id manually
    public static function find($id) {
        //self used to access static methods in the class
        $listings = self::all();
        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }

    }
}