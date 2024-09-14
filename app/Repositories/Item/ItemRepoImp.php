<?php
namespace App\Repositories\Item;
use App\Helpers\ImageHelper;
use App\Models\Item;
use Illuminate\Http\Request;
class ItemRepoImp implements ItemRepo
{
    function index($categoireId)
    {
        return Item::Where("categorie_id",$categoireId)->with('category')->get();
    }
    function store(Request $request)
    {
        try {
            $imageName = ImageHelper::uploadImage($request->file("image"), 'images/image');
            $item = new Item();
            $item->fill($request->all());
            $item->image = $imageName;
            $item->save();
            return $item;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function show($id)
    {
        $item = Item::with(['prices','images'])->find($id);
        if ($item) {
            return $item;
        }
        return $item;
    }
}
