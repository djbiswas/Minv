@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Account Types</h5>
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
                        <th>Transaction Type</th>
                        <th>For</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($account_types as $account_type)
                        <tr>
                            <td>{{$account_type->name}} </td>
                            <td>{{$account_type->crd}} </td>
                            <td class="has-text-right">
                                {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                                <form action="{{ route('account_types.destroy',$account_type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                    <a class="btn btn-info" href="{{route('account_types.edit', $account_type->id)}}"> Edit</a>
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
