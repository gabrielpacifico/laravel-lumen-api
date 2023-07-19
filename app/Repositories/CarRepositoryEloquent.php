<?php 

namespace App\Repositories;
use App\Repositories\CarRepositoryInterface;
use App\Models\Carros;
use Illuminate\Http\Request;

class CarRepositoryEloquent implements CarRepositoryInterface
{

    private $model; 

    public function __construct(Carros $carros)
    {
        $this->model = $carros;
    }

    public function GetAll(){

        return $this->model->all();

    }

    public function Get($id){

        return $this->model->find($id);

    }

    public function Insert(Request $request){
        
        return $this->model->create($request->all());
    }

    public function update($id, Request $request){

        return $this->model->find($id)
                    ->update($request->all());

    }

    public function Delete($id){

        return $this->model->find($id)
                    ->delete();
    }
}