@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Product Brands</h5>
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
                        <th>Product Brand</th>
                        <th>Info</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{$brand->name}} </td>
                            <td>{{$brand->info}} </td>
                            <td class="has-text-right">
                                {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                    <a class="btn btn-info" href="{{route('brands.edit', $brand->id)}}"> Edit</a>
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
