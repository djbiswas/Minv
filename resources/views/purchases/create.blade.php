@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Product Purchase </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Product Form</div>
                <div class="card-body card-block">

                {!!  Form::open(['route' => 'purchases.store'])  !!}

                <!-- Date Input Form -->
                    <div class="form-group  ">
                        {{Form::label('date ','Date:') }}
                        {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Date', 'required']) }}
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
                            {{Form::number('unitPrice', null, ['class' => 'unitPrice form-control', 'placeholder' => 'Unit Price', 'required']) }}
                            @error('unitPrice')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Quantity Input Form -->
                        <div class="form-group col">
                            {{Form::label('quantity','Quantity:') }}
                            {{Form::number('quantity', null, ['class' => 'oqty form-control', 'placeholder' => 'Quantity', 'required']) }}
                        </div>

                        <!-- total Input Form -->
                        <div class="form-group col">
                            {{Form::label('totalPrice','Total Price:') }}
                            {{Form::number('totalPrice', null, ['class' => 'totalPrice form-control', 'id' => 'totalPrice','placeholder' => 'Total Price', 'required', 'readonly' ]) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            {{Form::label('pay','Total Pay:') }}
                            {{Form::number('pay', null, ['class' => 'pay form-control', 'id' => 'pay','placeholder' => 'Total Pay', 'required' ]) }}
                        </div>

                        <div class="form-group col">
                            {{Form::label('due','Total Due:') }}
                            {{Form::number('due', null, ['class' => 'pay form-control', 'id' => 'due','placeholder' => 'Total Due', 'required', 'readonly']) }}
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

@section('scripts')
<script>
    // sell option js
    $(document).on('keyup', '.oqty', function(event) {
        var qty = 0;
        var unitPrice = 0;
        var totalPrice = 0;
        qty = $(this).val();
        unitPrice = $('.unitPrice').val();
        totalPrice = (unitPrice * qty);
        $('#totalPrice').val(totalPrice.toFixed(2));
        $('#pay').val(totalPrice.toFixed(2));
        $('#due').val(0);

    });

    $(document).on('keyup', '.unitPrice', function(event) {
        var qty = 0;
        var unitPrice = 0;
        var totalPrice = 0;
        unitPrice = $(this).val();
        qty = $('.oqty').val();
        totalPrice = (unitPrice * qty);
        $('#totalPrice').val(totalPrice.toFixed(2));
        $('#pay').val(totalPrice.toFixed(2));
        $('#due').val(0);

    });

    $(document).on('keyup', '.pay', function(event) {
        var pay = 0;
        var totalPrice = 0;
        var due = 0;
        pay = $(this).val();
        totalPrice = $('#totalPrice').val();
        due = totalPrice - pay;
        $('#due').val(due.toFixed(2));

    });



</script>
@endsection