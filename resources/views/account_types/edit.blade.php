@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Add Account Type</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Account Type Form</div>
                <div class="card-body card-block">

                {!!  Form::model($account_type,['method' =>'PATCH', 'route' => ['account_types.update', $account_type->id]])  !!}


                <!-- Name Input Form -->
                    <div class="form-group  ">
                        {{Form::label('name','Transaction Type:') }}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Transaction Type', 'required']) }}
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Cfd Select Field -->
                    <div class="form-group  ">
                        {{Form::label('crd','For:') }}

                        {{Form::select('crd', ['Debit' => 'Debit','Credit' => 'Credit','Both' =>'Both'], null, ['class' => 'form-control','id' => 'crd', 'placeholder' => 'Pick a Option...', 'required']) }}
                        @if ($errors->has('crd'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('crd') }}</strong>
                                </span>
                        @endif
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
