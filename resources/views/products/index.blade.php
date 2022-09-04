@extends('layouts.app')
@section('content')
    @if(session('status'))
        <div class="alert alert-success d-flex justify-content-between align-items-center fade show animate__animated animate__fadeInDown" role="alert">
            <div>
                {{session('status')}}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table border table-striped table-hover align-middle">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Sub Category Name</th>
                <th scope="col">Unit Price($)</th>
                <th scope="col">Original Price($)</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Publicsh</th>
            </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td class="w-25">
                            <i class="bi bi-gem text-danger"></i>
                            {{$product->name}}
                        </td>
                        <td >{{$product->category->name}}</td>
                        <td>{{($product->sub_category_id != null) ? $product->subCategory->name: ' '}}</td>
                        <td class="text-center">{{$product->product_unit_value}}</td>
                        <td class="text-center">{{$product->original_price}}</td>
                        <td>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-link text-warning text-decoration-none me-1">
                                <i class="bi bi-pencil-square "></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('products.destroy',$product->id)}}" method="post" id="del{{$product->id}}" class="d-inline-block">
                                @csrf
                                @method('delete')
                            </form>
                            <button class="btn btn-link text-danger me-1 del-btn" form="del{{$product->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                        <td>
                            @if($product->published == true)
                                <button class="btn btn-success px-4 text-white">Yes</button>
                            @else
                                <button class="btn btn-danger px-4 text-white">No</button>

                            @endif
                        </td>
                    </tr>

                @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection


@push('scripts')


@endpush
