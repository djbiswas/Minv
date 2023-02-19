@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>New Transaction</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row " style="margin-top: 2%;">
        <div class="col">
            <div class="card">
                <div class="card-header">Credit Form</div>
                <div class="card-body card-block">

                    {!!  Form::open(['route' => 'accounts.store'])  !!}

                    <div class="form-row">
                        <!-- Date Input Form -->
                        <div class="form-group col-4">
                            {{Form::label('date','Date:') }}
                            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                        <!-- Name Input Form -->
                        <div class="form-group col-4 ">
                            {{Form::label('credit','Amount') }}
                            {{Form::text('credit', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required']) }}
                            @error('credit')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                    {{Form::text('debit', 0, ['class' => 'form-control', 'placeholder' => 'Amount', 'required','hidden']) }}

                        <!-- Reason Select Field -->
                        <div class="form-group  col">
                            {{Form::label('account_type_id','Reason:') }}

                            {{Form::select('account_type_id', $account_types, null, ['class' => 'form-control','id' => 'account_type_id', 'placeholder' => 'Pick a Reason...', 'required']) }}
                            @if ($errors->has('account_type_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_type_id') }}</strong>
                                    </span>
                            @endif

                        </div>


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


    <div class="row " style="margin-top: 2%;">
        <div class="col">
            <div class="card">
                <div class="card-header">Debit Form</div>
                <div class="card-body card-block">

                    {!!  Form::open(['route' => 'accounts.store'])  !!}

                    <div class="form-row">
                        <!-- Date Input Form -->
                        <div class="form-group col-4">
                            {{Form::label('date','Date:') }}
                            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                        <!-- Name Input Form -->
                        <div class="form-group col-4 ">
                            {{Form::label('debit','Amount') }}
                            {{Form::text('debit', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required']) }}
                            @error('debit')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                    {{Form::text('credit', 0, ['class' => 'form-control', 'placeholder' => 'Amount', 'required','hidden']) }}


                    <!-- Reason Select Field -->
                        <div class="form-group  col">
                            {{Form::label('account_type_id','Reason:') }}

                            {{Form::select('account_type_id', $account_types, null, ['class' => 'form-control','id' => 'account_type_id', 'placeholder' => 'Pick a Reason...', 'required']) }}
                            @if ($errors->has('account_type_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_type_id') }}</strong>
                                    </span>
                            @endif

                        </div>

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
