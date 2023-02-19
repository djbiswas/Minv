@extends('layouts.admin')

@section('content')
    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>suppliers</h5>
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">
                <div class="row">
                    <div class="col">supplier Payments</div>
                    <div class="col text-right">
                        <a href="{{route('suppliers.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-account-edit"></i> suppliers List</a>
                    </div>
                </div>
            </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col">
                        <table id="suppliers" class="table is-narrow">
                            <thead>
                            <tr>
                                <th>suppliers Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Buy</th>
                                <th>Pay</th>
                                <th>Due</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->phone}}</td>
                                <td>{{$supplier->email}}</td>
                                <td>{{$supplier->buy}}</td>
                                <td>{{$supplier->pay}}</td>
                                <td>{{$supplier->due}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! Form::open(['route' => 'supplier_paid', 'method' => 'post']) !!}
                {{csrf_field()}}

                {{Form::text('supplier_id', $supplier->id, ['class' => 'form-control', 'placeholder' => '', 'required','hidden']) }}


                <div class="row">
                    <div class="col">
                        <!-- Date Input Form -->
                        <div class="form-group">
                            {{Form::label('date','Date:') }}
                            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <!-- Payment Input Form -->
                        <div class="form-group">
                            {{Form::label('pay','Payment:') }}
                            {{Form::number('pay', null, ['class' => 'form-control', 'placeholder' => 'Pay', 'required']) }}
                        </div>

                    </div>
                </div>

                <div class="text-right">

                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>

@endsection

