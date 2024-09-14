<?php
namespace App\Repositories\PricesRespositories;
interface PricesRep
{
    public function show($id);
    public function store(array $data);
    

}
