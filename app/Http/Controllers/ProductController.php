<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
//        dump($products);
        return view('products.index',[
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {

        DB::beginTransaction();

        try{

            if($request->hasFile('photo')){
//                $newName = "photo_".uniqid().".".$request->file('photo')->extension();
                $newName = time().'.'.$request->file('photo')->extension();
                $request->file('photo')->storeAs("public/photo",$newName);

            }else{
                $newName = null;
            }

            $newProduct = new product();
            $newProduct->name = ucwords($request->name);
            $newProduct->category_id = $request->category;
            $newProduct->sub_category_id = $request->sub_category;
            $newProduct->brand_id = $request->addOn;
            $newProduct->product_highLight = $request->highlight;
            $newProduct->product_code = $request->productCode;
            $newProduct->ordering = $request->ordering;
            $newProduct->ingredient = $request->ingredient;
            $newProduct->nutrient = $request->nutrient;
            $newProduct->product_dynamicLink = $request->product_dynamic_link;
//            $newProduct->product_specification = $request->nutrient;
            $newProduct->original_price = $request->original_price;
            $newProduct->min_order = $request->min_order;
            $newProduct->max_order = $request->max_order;
            $newProduct->product_unit_value = $request->product_unit_value;
            $newProduct->prd_unit = $request->prd_unit;
            $newProduct->search_keyword = $request->search_keyword;

            $newProduct->description = $request->description;
            $newProduct->image = $newName;

            $newProduct->save();

            DB::commit();

        }
        catch(\Exception $e){
            DB::rollBack();
            throw $e;

        }

        return redirect()->back()->with('status','Product Adding successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('products.edit',[
            'product'=>$product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        DB::beginTransaction();

        try{

            if($request->hasFile('photo')){

                //            delete old photo
                Storage::delete("public/photo/".$product->photo);

                $newName = time().'.'.$request->file('photo')->extension();
                $request->file('photo')->storeAs("public/photo",$newName);
            }else{
                $newName = null;
            }

//            $newProduct = new product();
            $product->name = ucwords($request->name);
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->addOn;
            $product->product_highLight = $request->highlight;
            $product->product_code = $request->productCode;
            $product->ordering = $request->ordering;
            $product->ingredient = $request->ingredient;
            $product->nutrient = $request->nutrient;
            $product->product_dynamicLink = $request->product_dynamic_link;
//            $product->product_specification = $request->nutrient;
            $product->original_price = $request->original_price;
            $product->min_order = $request->min_order;
            $product->max_order = $request->max_order;
            $product->product_unit_value = $request->product_unit_value;
            $product->prd_unit = $request->prd_unit;
            $product->search_keyword = $request->search_keyword;

            $product->description = $request->description;
            $product->image = $newName;

            $product->update();

            DB::commit();

        }
        catch(\Exception $e){
            DB::rollBack();
            throw $e;

        }

        return redirect()->route('products.index')->with('status','Product Updating successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {

        Storage::delete('public/photo/'.$product->image);

        $product->delete();
        return redirect()->back()->with('status',"Deleted successful");
    }
}
