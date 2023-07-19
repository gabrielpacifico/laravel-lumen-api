<?php

namespace App\Services;

use App\Models\ValidationCars;
use App\Repositories\CarRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CarService
{
    
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function GetAll(){
        $carros = $this->carRepository->GetAll();

        try {

            if(count($carros) > 0){
                return response()->json($carros, HttpResponse::HTTP_OK);
                
            } else{
                return response()->json([], HttpResponse::HTTP_OK);
            }

        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        

    }

    public function Get($id){
        
        try{
            $carro = $this->carRepository->Get($id);
            
            if((bool)($carro)){
                return response()->json($carro, HttpResponse::HTTP_OK);
                
            }else{
                return response()->json(null, HttpResponse::HTTP_NOT_FOUND);
            }

        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function Insert(Request $request){
        
        $validator = Validator::make(
            $request->all(),
            ValidationCars::RULE_CAR  // Validação de dados recebidos no Body
        );

        if($validator->fails()){

            return response()->json($validator->errors(), HttpResponse::HTTP_BAD_REQUEST);
            
        }else{

            try{
                
                $carro = $this->carRepository->Insert($request);
                return response()->json($carro, HttpResponse::HTTP_CREATED);
            
            } catch (QueryException $exception) {
                return response()->json(['error' => 'Erro de conexão com o banco de dados.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

    }

    public function Update($id, Request $request){
        
        $validator = Validator::make(
            $request->all(),
            ValidationCars::RULE_CAR  // Validação de dados recebidos no Body
        );

        if($validator->fails()){

            return response()->json($validator->errors(), HttpResponse::HTTP_BAD_REQUEST);
            
        }else{

            try{
                
                $carro = $this->carRepository->Update($id, $request);
                return response()->json($carro, HttpResponse::HTTP_OK);
            
            } catch (QueryException $exception) {
                return response()->json(['error' => 'Erro de conexão com o banco de dados.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function Delete($id){

        $this->carRepository->Delete($id);

        try{

            return response()->json("Removido com sucesso.", HttpResponse::HTTP_OK);
        
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}