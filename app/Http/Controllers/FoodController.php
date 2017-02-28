<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contracts\FoodRepositoryInterface;
use App\Exceptions\ApiGenericException;
use \stdClass;

class FoodController extends Controller
{
    //declare the food repository
    private $food_repo;

    public function __construct(FoodRepositoryInterface $food_repo) {
        //inject the instance of the food repository
        $this->food_repo = $food_repo;
    }

    public function index() {

        //obtain the result of the query from the service
        $foods = $this->food_repo->index();

        //success
        return response()->success($foods);
    }

    public function store(Request $request) {

        /* ADD VALIDATIONS HERE*/

        //create a generic object with the data, to pass it to the impementation
        $obj = new \stdClass();

        $obj->description = $request->input('description');
        $obj->manufacturer = $request->input('manufacturer');
        $obj->ndb_number = $request->input('ndb_number');

        $response = $this->food_repo->store($obj);

        return response()->success($response);
    }

    public function destroy($id) {
        $response = $this->food_repo->destroy($id);
        return response()->success($response);
    }

    public function update($id,Request $request) {

        $obj = new stdClass();

        $obj->description = $request->input('description');
        $obj->manufacturer = $request->input('manufacturer');
        $obj->ndb_number = $request->input('ndb_number');

        $response = $this->food_repo->update($id,$obj);

        return response()->success($response);
    }

    public function show($id) {
        $response = $this->food_repo->show($id);
        return response()->success($response);
    }
}
