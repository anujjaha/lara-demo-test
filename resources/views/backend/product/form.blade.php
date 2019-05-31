<div class="form-horizontal">

    {{-- Title --}}
    <div class="form-group">
        <label for="title" class="col-md-2 control-label">
            Title : 
        </label>
        
        <div class="col-md-4">
            <input type="text" name="title" id="title" value="{!! isset($product) ? $product->title : '' !!}" class="form-control" placeholder="Title" required="required"> 
        </div>
    </div>

    {{-- SKU --}}
    <div class="form-group">
        <label for="sku" class="col-md-2 control-label">
            SKU : 
        </label>
        
        <div class="col-md-4">
            <input type="text" name="sku" id="sku" value="{!! isset($product) ? $product->sku : '' !!}" class="form-control" placeholder="SKU" required="required"> 
        </div>
    </div>

    {{-- Qty --}}
    <div class="form-group">
        <label for="quantity" class="col-md-2 control-label">
            Quantity : 
        </label>
        
        <div class="col-md-4">
            <input type="number" name="quantity" id="quantity" value="{!! isset($product) ? $product->quantity : '0' !!}" class="form-control" min="0" step="1"  required="required"> 
        </div>
    </div>

    {{-- Price --}}
    <div class="form-group">
        <label for="price" class="col-md-2 control-label">
            Price : 
        </label>
        
        <div class="col-md-4">
            <input type="number" name="price" id="price" value="{!! isset($product) ? $product->price : '0' !!}" class="form-control" min="0" step="0.1"  required="required"> 
        </div>
    </div>

    {{-- Description --}}
    <div class="form-group">
        <label for="description" class="col-md-2 control-label">
            Description : 
        </label>
        
        <div class="col-md-4">
            <textarea name="description" id="description" class="form-control">{!! isset($product) ? $product->description : '' !!}</textarea>
        </div>
    </div>

    <div class="col-md-6 form-group text-center">
        <input type="submit" name="Create" value="{!! isset($product) ? 'Update' : 'Create' !!}" class="btn btn-primary">
        <input type="reset" name="Reset" value="Reset" class="btn btn-primary">
    </div>
</div>