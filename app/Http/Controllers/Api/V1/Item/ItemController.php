<?php

namespace App\Http\Controllers\Api\V1\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreItemRequest;
use App\Http\Resources\V1\ItemResource;
use App\Repositories\Item\ItemRepo;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
class ItemController extends Controller
{
    protected $repository;

    public function __construct(ItemRepo $repository)
    {
        $this->repository = $repository;
    }

    public function index($categoireId)
    {
        $item =$this->repository->index($categoireId);
        if($item){
            return ApiResponse::success(ItemResource::collection($item,true, 200));
        }
        return ApiResponse::error("Failed to SELECT Items", 404);
    }
    public function show($id)
    {
          $item = $this->repository->show($id);
          if($item){
            return ApiResponse::success(new ItemResource($item), true, 200);
          }
        return ApiResponse::error("Failed to find Items", 404);

    }
    public function store(StoreItemRequest $request)
    {
        try {
            $this->repository->store($request);
            return ApiResponse::Message("Add Items successful", true, 200);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 500);
        }
    }



    public function update($id,Request $request)
    {
        return ApiResponse::Message($request->all(),true,200);
        $item->fill($request->all());
        $updated = $item->save();
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'تم تحديث العميل بنجاح.',
                ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'فشل في تحديث العميل. يرجى المحاولة مرة أخرى.',
            ], 500);
        }
    }
}
