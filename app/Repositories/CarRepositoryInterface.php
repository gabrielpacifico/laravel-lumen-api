<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface CarRepositoryInterface
{

    public function GetAll();
    public function Get($id);
    public function Insert(Request $request);
    public function Update($id, Request $request);
    public function Delete($id);

}