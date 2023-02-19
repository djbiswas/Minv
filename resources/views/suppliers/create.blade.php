@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Add Supplier</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Supplier Form</div>
                <div class="card-body card-block">

                {!!  Form::open(['route' => 'suppliers.store'])  !!}

                    <!-- Name Input Form -->
                    <div class="form-group  ">
                        {{Form::label('name','Supplier Name:') }}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Supplier Name', 'required']) }}
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row ">
                        <!-- Phone Input Form -->
                        <div class="form-group col">
                            {{Form::label('phone','Supplier Phone:') }}

                            {{Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Supplier Phone', 'required']) }}
                            @error('phone')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Input Form -->
                        <div class="form-group col ">
                            {{Form::label('email','Email:') }}
                            {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                            @error('email')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Address Input Form -->
                    <div class="form-group  ">
                        {{Form::label('address','Address:') }}
                        {{Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required']) }}
                        @error('address')
                        <span>{{ $message }}</span>
                        @enderror
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
