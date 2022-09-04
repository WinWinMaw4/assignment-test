<?php

namespace App\Http\Controllers;

use App\Models\productSpecification;
use App\Http\Requests\StoreproductSpecificationRequest;
use App\Http\Requests\UpdateproductSpecificationRequest;

class ProductSpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductSpecificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductSpecificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productSpecification  $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function show(productSpecification $productSpecification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productSpecification  $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function edit(productSpecification $productSpecification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductSpecificationRequest  $request
     * @param  \App\Models\productSpecification  $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductSpecificationRequest $request, productSpecification $productSpecification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productSpecification  $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function destroy(productSpecification $productSpecification)
    {
        //
    }
}
