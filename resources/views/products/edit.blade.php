@extends('layouts.app')
@section('content')
    @if(session('status'))
        <div class="alert alert-success d-flex justify-content-between align-items-center fade show" role="alert">
            <div>
                {{session('status')}}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-info ">
            <span class="fs-4 text-white">Update Product Information</span>
        </div>
        <div class="card-body">
            <form action="{{route('products.update',$product->id)}}" id="productEditForm" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            </form>

            <div class="row row-cols-1 row-cols-lg-2 gx-3">
                    <div class="col">
                        <div class="row row-cols-1 gy-3">
                            {{--                                product name--}}
                            <div class="col">
                                <label for="name" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Product Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Please Product Name" id="name" value="{{old('name',$product->name)}}" form="productEditForm">
                                @error('name')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                category--}}
                            <div class="col">
                                <label for="category" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Select Category</label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" id="category" form="productEditForm">
                                    <option value="" class="text-black-50" >Select Category Name</option>

                                    @foreach(\App\Models\category::all() as $category)
                                        {{--                                            {{ $category->id==$product->category_id ? 'selected' : '' }}--}}
                                        <option value="{{ $category->id }}" {{ $category->id==$product->category_id ? 'selected' : '' }} form="productEditForm">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                sub category--}}
                            <div class="col">
                                <label for="sub_category" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Select Sub Category Name</label>
                                <select name="sub_category" class="form-select @error('sub_category') is-invalid @enderror" id="sub_category" form="productEditForm">
                                    <option value="" class="text-secondary" >Select Sub Category Name</option>

                                    @foreach(\App\Models\subCategory::all() as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $subCategory->id==$product->sub_category_id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category')
                                <div class="invalid-feedback">
                                    {{--                                        <span>The category field is required</span>--}}
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Add on--}}
                            <div class="col">
                                <label for="addOn" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Add On</label>
                                <select name="addOn" class="form-select @error('addOn') is-invalid @enderror" id="addOnEdit" form="productEditForm" >
                                    <option></option>
                                    @foreach(\App\Models\brand::all() as $addOn)
                                        <option value="{{ $addOn->id }}" {{ $addOn->id==$product->brand_id ? 'selected' : '' }}>{{ $addOn->name }}</option>
                                    @endforeach
                                </select>
                                @error('addOn')
                                <div class="invalid-feedback">
                                   <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                product Hightligh information--}}
                            <div class="col">
                                <label for="highlight" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Product Highlight Information</label>
                                {{--                                    <input type="text" class="form-control  @error('highlight') is-invalid @enderror" name="highlight" placeholder="Please Highlight Information" id="highlight" value="{{old('highligh')}}">--}}
                                {{--                                    <textarea name="highlight" class="form-control form- @error('highlight') is-invalid @enderror" id="" cols="30" rows="3">@if(old('highlight')) {{old('highlight')}} @else Please hightlight information @endif </textarea>--}}
                                <textarea name="highlight" class="form-control form- @error('highlight') is-invalid @enderror" id="" cols="30" rows="2" form="productEditForm">{{old('highlight',$product->product_highLight)}}</textarea>

                                @error('highlight')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                product code--}}
                            <div class="col">
                                <label for="productCode" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Product Code</label>
                                <input type="text" class="form-control  @error('productCode') is-invalid @enderror" name="productCode" placeholder="Please Enter Product Code" id="productCode" value="{{old('productCode',$product->product_code)}}" form="productEditForm">
                                @error('productCode')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                ordering--}}
                            <div class="col">
                                <label for="ordering" class="form-label fw-bold">Ordering</label>
                                <input type="text" class="form-control  @error('ordering') is-invalid @enderror" name="ordering" placeholder="Ordering" id="ordering" value="{{old('ordering',$product->ordering)}}" form="productEditForm">
                                @error('ordering')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                             ingredient   --}}
                            <div class="col">
                                <label for="ingredient" class="form-label fw-bold">Ingredient</label>
                                <textarea name="ingredient" class="form-control form- @error('ingredient') is-invalid @enderror" id="" cols="30" rows="4" form="productEditForm">{{old('ingredient',$product->ingredient)}}</textarea>

                                @error('ingredient')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                nutrient--}}
                            <div class="col">
                                <label for="nutrient" class="form-label fw-bold">Nutrient</label>
                                <input type="text" class="form-control  @error('nutrient') is-invalid @enderror" name="nutrient" placeholder="Nutrient" id="nutrient" value="{{old('nutrient',$product->nutrient)}}" form="productEditForm">
                                @error('nutrient')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                product dynamic link--}}
                            <div class="col">
                                <div class="my-2"></div>
                                <label for="product_dynamic_link" class="form-label fw-bold">Product Dynamic Link :</label>
                                <input type="text" class="form-control  @error('product_dynamic_link') is-invalid @enderror" name="product_dynamic_link" placeholder="" id="product_dynamic_link" value="{{old('product_dynamic_link',$product->product_dynamic_link)}}" form="productEditForm">
                                @error('product_dynamic_link')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Product Specification--}}
                            <div class="col">
                                <label for="product_specification" class="form-label fw-bold d-block">Product Specification :</label>
                                <div class="">
                                    <label for="title1">Title:1</label>
                                    <input type="text" class="form-control form-control-sm mb-2  @error('title1') is-invalid @enderror " name="title1" placeholder="" id="title1" value="{{old('title1')}}" form="productEditForm">
                                    @error('title1')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                    <label for="description1">Description:1</label>
                                    <input type="text" class="form-control form-control-sm mb-2 @error('description1') is-invalid @enderror" name="description1" placeholder="" id="description1" value="{{old('description1')}}" form="productEditForm">
                                    @error('description1')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <a class="btn btn-link text-decoration-none text-black fw-bold">
                                        <span class="bi bi-plus-lg text-black fw-bold"></span>
                                        Add More Specification
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 g-3">
                            {{--                                Original Price--}}
                            <div class="col">
                                <label for="original_price" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup> Original Price</label>
                                <input type="number" class="form-control  @error('original_price') is-invalid @enderror" name="original_price" placeholder="0" id="original_price" value="{{old('original_price',$product->original_price)}}" form="productEditForm">
                                <div class="text-danger fw-bold">(Unit Price($):)</div>
                                @error('original_price')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Min Order--}}
                            <div class="col">
                                <label for="min_order" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup> Minimum Order</label>
                                <input type="number" class="form-control  @error('min_order') is-invalid @enderror" name="min_order" placeholder="Please Minimun Order" id="min_order" value="{{old('min_order',$product->min_order)}}" form="productEditForm">
                                @error('min_order')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Max Order--}}
                            <div class="col">
                                <label for="max_order" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup> Maximum Order</label>
                                <input type="number" class="form-control  @error('max_order') is-invalid @enderror" name="max_order" placeholder="Please Maximum Order" id="max_order" value="{{old('max_order',$product->max_order)}}" form="productEditForm">
                                @error('max_order')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Product Unit Value--}}
                            <div class="col">
                                <label for="product_unit_value" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup> Product Unit Value</label>
                                <input type="text" class="form-control  @error('product_unit_value') is-invalid @enderror" name="product_unit_value" placeholder="Please provide product unit value" id="product_unit_value" value="{{old('product_unit_value',$product->product_unit_value)}}" form="productEditForm">
                                @error('product_unit_value')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Prd Unit--}}
                            <div class="col">
                                <label for="prd_unit" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Prd_unit</label>
                                <input type="string" class="form-control  @error('prd_unit') is-invalid @enderror" name="prd_unit" placeholder="Please product unit " id="prd_unit" value="{{old('prd_unit',$product->prd_unit)}}" form="productEditForm">
                                @error('prd_unit')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Search/Tag keyword--}}
                            <div class="col">
                                <label for="search_keyword" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Search Tag/Keyword</label>
                                <input type="text" class="form-control  @error('search_keyword') is-invalid @enderror" name="search_keyword" placeholder="Please Search Tag" id="search_keyword" value="{{old('search_keyword',$product->search_keyword)}}" form="productEditForm">
                                @error('search_keyword')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                product Description--}}
                            <div class="col">
                                <label for="description" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Product Description</label>
                                <textarea name="description" class="form-control form- @error('description') is-invalid @enderror" id="" cols="30" rows="4" form="productEditForm">{{old('description',$product->description)}}</textarea>

                                @error('description')
                                <div class="invalid-feedback">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            {{--                                Product Image--}}
                            <div class="col">
                                <label for="image" class="form-label fw-bold"><sup class="text-danger me-1"><small><i class="bi bi-asterisk"></i></small></sup>Product Image</label>
                                <div class="py-2 px-5">
                                    @include('dropzone.uui')
                                    @error('photo')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                    @isset($product->image)
                                        <img src="{{asset('storage/photo/'.$product->image)}}" class="cover-img w-25 rounded  value="{{ old('photo',$product->photo) }}" alt="">
                                    @endisset
                                </div>



                            </div>
                        </div>
                    </div>



                </div>



            <div class="col pt-4 pb-2">
                <button class="btn btn-primary me-2 productEditForm" form="productEditForm">Save</button>
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-outline-primary cancel">Cancel</a>
            </div>

        </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(document).ready(function() {
            $('#addOnEdit').select2({
                placeholder : 'Select',
                allowClear : true,
            });
        });
    </script>

@endpush
