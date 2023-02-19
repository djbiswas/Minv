@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Suppliers</h5>
                </div>
            </div>
        </div>
    </div>
<div class="row" style="margin-top: 2%">
    <div class="col">
        <div class="bg-white rounded-lg py-5 px-5">


            <table id="report" class="table is-narrow">
                <thead>
                <tr>
                    <th>Supplier Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Due</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->name}} </td>
                        <td>{{$supplier->phone}} </td>
                        <td>{{$supplier->email}} </td>
                        <td>{{$supplier->due}} </td>
                        <td>{{$supplier->address}} </td>
                        <td class="has-text-right">
                            {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                            <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                <a class="btn btn-info" href="{{route('suppliers.edit', $supplier->id)}}"> Edit</a>
                                <a class="btn btn-success" href="{{route('supplier_pay', $supplier->id)}}"> Payment</a>
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
