<?php
namespace App\Repositories\Image;
use Illuminate\Http\Request;

interface ImageRepo{
    public function show($id);
    public function store(Request $request);
}
