<?php
namespace App\Services;

use App\Contracts\FoodRepositoryInterface;
use App\Exceptions\Custom\ApiGenericException;
use \App\Food;
use \stdClass;

class FoodRepositoryEloquent implements FoodRepositoryInterface {

    //obtain all foods
    public function index() {
        $foods = Food::all();
        return $foods;
    }

    public function store(stdClass $obj) {

        $food = new Food();

        $food->description = $obj->description;
        $food->manufacturer = $obj->manufacturer;
        $food->ndb_number = $obj->ndb_number;

        //save
        $food->save();

        //set the ID
        $obj->id = $food->id;

        //return the original object
        return $obj;
    }

    public function destroy($id) {
        $food = Food::find($id);

        if ($food == null)
            throw new ApiGenericException("The fruit does not exist Can't Delete");

        $food->delete();
    }

    public function update($id, stdClass $obj) {

        //obtain the object
        $food = Food::find($id);

        if ($food == null)
            throw new ApiGenericException("The fruit does not exist Can't Update");

        //all ok, the food exist. Update the fields
        $food->description = $obj->description;
        $food->manufacturer = $obj->manufacturer;
        $food->ndb_number = $obj->ndb_number;

        //adds the ID
        $obj->id = $food->id;

        $food->save();

        return $obj;
    }

    public function show($id) {
        $food = Food::find($id);

        if ($food == null)
            throw new ApiGenericException("The required fruit does not exist");

        //all ok, the food exist.

        $obj = new stdClass();
        $obj->description = $food->description;
        $obj->manufacturer = $food->manufacturer;
        $obj->ndb_number = $food->ndb_number;

        //adds the ID
        $obj->id = $food->id;

        return $obj;
    }
}
?>
