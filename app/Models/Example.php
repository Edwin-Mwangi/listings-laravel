<?php
namespace App\Models;

//model created manually 
// the model is then used in the route file

//for us we are using mysql in xampp
//you can view and choose which db options to use in /config/database.php
//edit mysql eg to sqlite if that's what you're using ''default' => env('DB_CONNECTION', 'mysql')' 
//then in /database dir create a new file ie 'database.sqlite'
//then set ur db-connection in .env to be the name of that file ie 'database.sqlite'

class Example {
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
        $examples = self::all();
        foreach($examples as $example){
            if($example['id'] == $id){
                return $example;
            }
        }

    }
}