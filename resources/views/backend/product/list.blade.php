@extends('layouts.app')

@section('content')

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Product List
                    <a href="{!! route('products.create') !!}" class="btn btn-sm btn-primary pull-right">
                        Create New 
                    </a>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-script')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">

var myDataTable;

$(document).ready(function() {
    
    myDataTable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('products.get-data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'sku', name: 'sku'},
            {data: 'quantity', name: 'quantity'},
            {data: 'price', name: 'price'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    setTimeout(function() {
        bindDeleteEvent();
    }, 1000);
});

/**
 * Bind Delete Event
 * 
 */
function bindDeleteEvent()
{
    var elements = document.querySelectorAll('.delete-product'),
        confirmStatus;

    if(elements)
    {
        for(var i = 0; i < elements.length; i++)
        {
            elements[i].onclick = function(e)
            {
                confirmStatus = confirm("Are you sure you want to Delete Product?");

                if(confirmStatus)
                {
                    deleteProduct(e.target);
                }
            }
        }
    }
}

/**
 * Delete Product
 * 
 * @param {Element}
 */
function deleteProduct(element)
{
    var productId = element.getAttribute('data-id');

    jQuery.ajax({
        url: '{!! route('products.delete') !!}',
        method: 'POST',
        dataType: 'JSON',
        data: {
            "_token": "{{ csrf_token() }}",
            productId: productId
        },
        success: function(data)
        {
            if(data.status == true)
            {
                swal('Good job!', data.message, 'success');
                myDataTable.clear().draw();
                bindDeleteEvent();
                return;
            }
            
            swal('Oh !', data.message, 'error');
        },
        error: function(data)
        {
            swal('Oh !', data.message, 'error');
        }
    })
}
</script>
@endsection
