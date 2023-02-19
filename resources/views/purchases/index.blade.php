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


                <table id="report" class="table is-narrow">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td> # </td>
                            <td>{{$purchase->date}}</td>
                            <td>{{$purchase->product->name}}</td>
                            <td>{{$purchase->quantity}}</td>
                            <td>{{$purchase->unitPrice}}</td>
                            <td>{{$purchase->totalPrice}}</td>

                            <td class="has-text-right">
                                {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                                <form id="deleteForm{{$purchase->id}}" action="{{ route('purchases.destroy',$purchase->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="btn btn-info" href="{{route('purchases.edit', $purchase->id)}}"> Edit</a>
                                <button id="delete{{$purchase->id}}" class="btn btn-danger" onclick="deletedata({{$purchase->id}})">Delete</button>

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
            alert(id);
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
