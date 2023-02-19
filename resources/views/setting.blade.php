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
                <div class="card-header">Setting Form</div>
                <div class="card-body card-block">

                    {!! Form::open(['route' => 'settings.store', 'method' => 'post','enctype' => 'multipart/form-data' ]) !!}

                    <div class="form-row">
                        <div class="form-group col-4 ">
                            <img src="/images/banner.jpg" alt="" width="100%">
                        </div>

                        <!-- Banner Input Form -->
                        <div class="form-group col">
                            {{Form::label('Banner','Banner:') }}
                            {{Form::file('banner', null) }}

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
