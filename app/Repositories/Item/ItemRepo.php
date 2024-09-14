<?php
namespace App\Repositories\Item;

use Illuminate\Http\Request;
interface ItemRepo{
   public function index($categoireId);
   public function show($id);
   public function store(Request $request);

}
