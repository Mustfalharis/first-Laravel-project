<?php

namespace App\Repositories\favorite;

use App\Models\Favorite;
use Exception;
use Illuminate\Support\Facades\Auth;

class FavoriteRepoImp implements FavoriteRepo
{

    public function index()
    {
        $userId = Auth::user()->id;
        try {
            return Favorite::with('item')->where('user_id', $userId)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function show($id) {}

    public function store($id)
    {
        $item = Favorite::create([
            'item_id' => $id,
        ]);
        if ($item) {
            return $item;
        }
        throw new Exception("Somthing in Error Please Try Again");
    }
    public function CheckByItemAndUser($item_id)
    {
        $userId = Auth::user()->id;
        $flag = Favorite::where('item_id', $item_id)
            ->where('user_id', $userId)
            ->first();
        if ($flag) {
            return true;
        }
        return false;
    }
    public function delete($id)
    {
        $userId = Auth::user()->id;
        $favorite = Favorite::where('user_id', $userId)
            ->where('id', $id)
            ->first();
        if ($favorite) {
            $favorite->delete();
            return true;
        }
        return false;
    }
}
