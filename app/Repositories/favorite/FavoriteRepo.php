<?php
namespace App\Repositories\favorite;

interface FavoriteRepo{
    public function index();
    public function show($id);
    public function store($id);
    public function CheckByItemAndUser($item_id);
    public function delete($id);

}
