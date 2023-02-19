@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Add Product Information</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Product Edit Form</div>
                <div class="card-body card-block">

                {!!  Form::model($product,['method' =>'PATCH', 'route' => ['products.update', $product->id]])  !!}
                @csrf

                <div class="row">

                    <!-- Name Input Form -->
                    <div class="form-group col ">
                        {{Form::label('name','Name:') }}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product Name', 'required']) }}
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col ">
                        {{Form::label('sku','Product Code:') }}
                        {{Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'Product Code', 'required']) }}
                        @error('sku')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                    <div class="row">
                        <div class="form-group col ">
                            {{Form::label('brand_id','Select Brand:') }}
                            {{Form::select('brand_id', $brands, null, ['class' => 'form-control', 'placeholder' => 'Select Brand', 'required']) }}
                            @error('brand_id')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col ">
                            {{Form::label('group_id','Select Group:') }}
                            {{Form::select('group_id', $groups, null, ['class' => 'form-control', 'placeholder' => 'Select Group', 'required']) }}
                            @error('group_id')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col ">
                            {{Form::label('product_type_id','Select Product Type:') }}
                            {{Form::select('product_type_id', $product_types, null, ['class' => 'form-control', 'placeholder' => 'Select Product Type', 'required']) }}
                            @error('product_type_id')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <!-- UnitPrice Input Form -->
                        <div class="form-group col ">
                            {{Form::label('unitPrice','Unit Price:') }}
                            {{Form::text('unitPrice', null, ['class' => 'form-control', 'placeholder' => 'Unit Price', 'required']) }}
                            @error('unitPrice')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- SellPrice Input Form -->
                        <div class="form-group col">
                            {{Form::label('sellPrice','Sell Price:') }}
                            {{Form::text('sellPrice', null, ['class' => 'form-control', 'placeholder' => 'Sell Price', 'required']) }}
                            @error('sellPrice')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>


                    </div>





                    <!-- Note Input Form -->
                    <div class="form-group">
                        {{Form::label('note','Note:') }}
                        {{Form::textarea('note', null, ['class' => 'form-control', 'rows' =>10, 'placeholder' => 'Note / Description', 'required']) }}
                    </div>



                    <div class="form-actions form-group">
                        <!-- Submit Button Form -->
                        {{Form::submit('Submit', ['class' => 'btn btn-primary float-right']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection
