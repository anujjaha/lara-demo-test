@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product
                    <a href="{!! route('products.create') !!}" class="btn btn-sm btn-primary pull-right">
                        Create New 
                    </a>
                </div>
            </div>

            <div class="panel panel-body">

                <form action="{!! route('products.update', ['id' => $product->id]) !!}" method="post">

                    {!! csrf_field() !!}
                    
                    @include('backend.product.form', ['product' => isset($product) ? $product : null])

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
