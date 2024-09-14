<?php

namespace App\Http\Controllers\Api\V1\Prices;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePricesItemRequest;
use App\Http\Resources\V1\PricesItemResource;
use App\Repositories\PricesRespositories\PricesRep;
use App\Responses\ApiResponse;

class PricesItemController extends Controller
{
    protected $repository;

    public function __construct(PricesRep $repository)
    {
        $this->repository = $repository;
    }
    function show($id)
    {
        try {
            $prices = $this->repository->show($id);
            return ApiResponse::success(PricesItemResource::collection($prices), true, 200);
        } catch (\Throwable $th) {
            return ApiResponse::error($th, 404);
        }
    }
    function store(StorePricesItemRequest $request)
    {
        $prices = $this->repository->store($request->all());
        if($prices){
            return ApiResponse::Message("add price in item successful", true, 200);
        }
        return ApiResponse::error("failed add Price,please try again", 500);
    }

    function update() {}
}
