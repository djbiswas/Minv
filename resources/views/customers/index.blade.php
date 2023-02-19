@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Customers</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 2%;">
        <div class="col">
            <div class="bg-white rounded-lg py-5 px-5">


                <table id="report" class="table is-narrow">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Due</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th>{{$customer->name}} </th>
                            <th>{{$customer->phone}} </th>
                            <th>{{$customer->email}} </th>
                            <th>{{$customer->due}} </th>
                            <th>{{$customer->address}} </th>
                            <td class="has-text-right">
                                {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                    <a class="btn btn-info" href="{{route('customers.edit', $customer->id)}}"> Edit</a>
                                    <a class="btn btn-success" href="{{route('customer_pay', $customer->id)}}"> Payment</a>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
