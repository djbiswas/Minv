@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Products</h5>
                </div>
            </div>
        </div>
    </div>

<div class="row" style="margin-top: 2%;">
    {{-- <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Total Product Value <br>
                    ৳ {{ $total_value }}
                </h3>
              
            </div>
          </div>
    </div> --}}

    <div class="col">
        <div class="bg-white rounded-lg py-5 px-5">


            <table id="report" class="table is-narrow">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th>Brand</th>
                    <th>Group</th>
                    <th>Type</th>
                    <th>Sell Price</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Product Value</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($products as $product)
                <tr>

                    <td>{{$product->name}} </td>
                    <td>{{$product->sku}} </td>
                    <td>{{$product->brand->name}} </td>
                    <td>{{$product->group->name}} </td>
                    <td>{{$product->product_type->name}} </td>
                    <td>{{$product->sellPrice}} </td>
                    <td>{{$product->unitPrice}} </td>
                    <td>{{$product->qty}} </td>
                    <td>{{$product->unitPrice * $product->qty}} </td>
                    
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('products.edit', $product->id)}}"> Edit</a>
                        </form>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
