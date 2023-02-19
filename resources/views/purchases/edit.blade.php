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
                <div class="card-header">Product Form</div>
                <div class="card-body card-block">

                {!!  Form::model($purchase,['method' =>'PATCH', 'route' => ['purchases.update', $purchase->id]])  !!}

                <!-- Date Input Form -->
                    <div class="form-group  ">
                        {{Form::label('date ','Date:') }}
                        {{Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Date', 'required']) }}
                        @error('date')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Product_id Select Field -->
                        <div class="form-group col-lg-6 ">
                            {{Form::label('product_id','Select Product:') }}
                            {{Form::select('product_id', $products, null, ['class' => 'form-control','id' => 'product_id', 'placeholder' => 'Pick a Product...', 'required']) }}
                            @if ($errors->has('product_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('product_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Supplier Name Select Field -->
                        <div class="form-group col ">
                            {{Form::label('supplier_id','Supplier Name:') }}

                            {{Form::select('supplier_id', $suppliers, null, ['class' => 'form-control','id' => 'supplier_id', 'placeholder' => 'Pick a Supplier Name...', 'required']) }}
                            @if ($errors->has('supplier_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier_id') }}</strong>
                                    </span>
                            @endif

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

                        <!-- Quantity Input Form -->
                        <div class="form-group col">
                            {{Form::label('quantity','Quantity:') }}
                            {{Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity', 'required']) }}
                        </div>
                    </div>


                    <!-- Note Input Form -->
                    <div class="form-group">
                        {{Form::label('note','Note:') }}
                        {{Form::textarea('note', null, ['class' => 'form-control', 'rows' =>10, 'placeholder' => 'Note / Description']) }}
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
