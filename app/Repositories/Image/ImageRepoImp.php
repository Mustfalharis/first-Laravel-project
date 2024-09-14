<?php
namespace App\Repositories\Image;
use App\Helpers\ImageHelper;
use App\Models\ImageItem;
use Illuminate\Http\Request;
class ImageRepoImp implements ImageRepo
{
    function show($id)
    {
        try {
            return ImageItem::where('item_id', $id)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    function store(Request $request)
    {
        try {
            $imageName = ImageHelper::uploadImage($request->file("image"), 'images/image_details');
            $ImageItem = new ImageItem();
            $ImageItem->fill($request->all());
            $ImageItem->image = $imageName;
            $ImageItem->save();
            return $ImageItem;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
