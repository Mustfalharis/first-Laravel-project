<?php

namespace App\Http\Controllers\Api\V1\Favorite;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFavoriteItemRequest;
use App\Http\Resources\V1\FavoriteResource;
use App\Repositories\favorite\FavoriteRepo;
use App\Responses\ApiResponse;
class FavoriteController extends Controller
{
    protected $repository;

    public function __construct(FavoriteRepo $repository)
    {
        $this->repository = $repository;
    }
    public function index() {
        try {
            $favorite = $this->repository->index();
           return  ApiResponse::success(FavoriteResource::collection($favorite),true,200);
        }catch(\Exception $e){
            return ApiResponse::Message($e,false,200);
        }
    }
    public function store(StoreFavoriteItemRequest $request) {
        if($this->repository->CheckByItemAndUser($request->item_id)){
         return ApiResponse::Message("The Item Already in favorite",false,200);
        }
        try {
            $this->repository->store($request->item_id);
            return ApiResponse::Message("Add Items successful", true, 200);
        } catch (\Exception $e) {
            return ApiResponse::error($e, 500);
        }
    }
    public function delete($id) {
        $favorite = $this->repository->delete($id);
        if($favorite){
           return ApiResponse::Message("delete item in favorite successful",true,200);
        }
        return ApiResponse::Message("Fild Delete Item in Favorite",false,500);
    }
}
