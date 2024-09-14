<?php
namespace App\Repositories\PricesRespositories;

use App\Models\PricesItem;

class PricesImp implements PricesRep
{
    public function show($id)
    {
        try{
         $price = PricesItem::where("item_id",$id)->get();
         return $price;
        }catch (\Exception $e) {
            throw $e;
        }

    }
    public function store(array $data)
    {
        $prices= PricesItem::create($data);
        if($prices)
        {
            return true;
        }
        return false;
    }
}
