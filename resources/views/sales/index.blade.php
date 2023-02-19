@extends('layouts.admin')
@section('content')

    <div class="row mt-minus">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">assignment</i>Sales</h5>
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
                            <th>No</th>
                            <th>Date</th>
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
                            <td>{{$sale->customer->name}}</td>
                            <td>{{$sale->netTotal}}</td>
                            <td>{{$sale->paid}}</td>
                            <td>{{$sale->due }}</td>
                            <td class="has-text-right">

                                <form id="deleteForm{{$sale->id}}" action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
{{--                                <a class="btn btn-info" href="{{route('sales.edit', $sale->id)}}"> Edit</a>--}}
                                <a class="btn btn-success" href="{{route('sales.show', $sale->id)}}" target="_blank">Invoice </a>
{{--                                <button onclick="deletedata({{$sale->id}})" class="btn btn-danger">Delete</button>--}}
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

    <script !src="">
        function deletedata(id){
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result=> {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    $("#deleteForm"+id).submit();
                }
            })
        }

    </script>
@endsection
