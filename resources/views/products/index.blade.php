@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Productos
                    <a href="{{route('tabla.create')}}" class="btn btn-danger float-right">Importar Productos</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.products_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('products.index')}}",
            responsive: true,
            columns: [{
                    data: 'name',
                    name: 'products.name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'price',
                    name: 'price',
                    searchable: false
                },
                {
                    data: 'quantity_left',
                    name: 'quantity_left',
                    searchable: false
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                }
            ]
        })
    })
</script>
@endsection
