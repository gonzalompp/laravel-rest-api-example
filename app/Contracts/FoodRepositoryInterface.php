<?php

namespace App\Contracts;

use \stdClass;

interface FoodRepositoryInterface {
    public function index();

    public function store(stdClass $obj);

    public function destroy($id);

    public function update($id, stdClass $obj);

    public function show($id);
}

?>
