@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Add Product Type</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Product Type Form</div>
                <div class="card-body card-block">

                {!!  Form::open(['route' => 'product_types.store'])  !!}

                <!-- Name Input Form -->
                    <div class="form-group  ">
                        {{Form::label('name','Product Type Name:') }}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product Type Name', 'required']) }}
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Note Input Form -->
                    <div class="form-group">
                        {{Form::label('info','Note:') }}
                        {{Form::textarea('info', null, ['class' => 'form-control', 'rows' =>10, 'placeholder' => 'Note / Description']) }}
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
