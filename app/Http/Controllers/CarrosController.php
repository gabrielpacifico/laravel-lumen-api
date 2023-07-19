<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;


class CarrosController extends Controller
{

    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function GetAll(){
        return $this->carService->GetAll();

    }

    public function Get($id){
        return $this->carService->Get($id);

    }

    public function Insert(Request $request){
        return $this->carService->Insert($request);

    }

    public function Update($id, Request $request){
        return $this->carService->Update($id, $request);
        
    }

    public function Delete($id){
        return $this->carService->Delete($id);

    }
}
