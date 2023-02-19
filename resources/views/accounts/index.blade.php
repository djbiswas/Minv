@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Transaction</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 10%;">
        <div class="col">
            <div class="bg-white rounded-lg py-5 px-5">


                <table id="report" class="table is-narrow">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Note</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <th>{{$account->date}} </th>
                            <th>{{$account->debit}} </th>
                            <th>{{$account->credit}} </th>
                            <th>{{$account->note}} </th>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
