@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Purchases</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2%;">
        <div class="col">
            <div class="bg-white rounded-lg py-5 px-5">


                <table id="sales_table" class="table is-narrow">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Customer Name</th>
                        <th>Net Total</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th> # </th>
                            <td>{{$sale->date}}</td>
                            <td>{{$sale->invoice}}</td>
                            <td>{{$sale->customer->name}}</td>
                            <td>{{$sale->netTotal}}</td>
                            <td>{{$sale->paid}}</td>
                            <td>{{$sale->due }}</td>
                            <td class="has-text-right text-center">
                                <a class="btn btn-dark" href="{{route('sales_returns.sr_form', $sale->id)}}">Return </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#sales_table').DataTable();
    </script>
@endsection
