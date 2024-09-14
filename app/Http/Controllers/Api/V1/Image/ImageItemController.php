<?php

namespace App\Http\Controllers\Api\V1\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreImagesItemRequest;
use App\Http\Resources\V1\ImagesItemResource;
use App\Repositories\Image\ImageRepo;
use App\Responses\ApiResponse;

class ImageItemController extends Controller
{
    protected $repository;

    public function __construct(ImageRepo $repository)
    {
        $this->repository = $repository;
    }
    public function show($id)
    {
        $images = $this->repository->show($id);
        if ($images) {
            return ApiResponse::success(new ImagesItemResource($images, true, 200));
        }
        return ApiResponse::error("images Not Found", 404);
    }
    public function store(StoreImagesItemRequest $request)
    {
        try {
            $this->repository->store($request);
            return ApiResponse::Message("Add image successful", true, 200);
        } catch (\Exception $e) {
            return ApiResponse::error("failure add image ", 500);
        }
    }
}
