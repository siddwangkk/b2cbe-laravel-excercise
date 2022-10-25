<div class="form-group pb-3">
    <label for="name" class="pb-1 h5">Name</label>
    <input type="text" id="item-name" name="name" value="{{old('name') ?? ''}}" class="form-control">
    <div id="name-error-msg" style="color:red;"></div>
</div>
<div class="form-group pb-3">
    <label for="url" class="pb-1 h5">URL</label>
    <input type="text" id="item-url" name="url" value="{{old('url') ?? ''}}" class="form-control">
    <div id="url-error-msg" style="color:red;"></div>
</div>

<div class="form-group pb-3">
    <label for="price" class="pb-1 h5">Price</label>
    <input type="text" id="item-price" name="price" value="{{old('price') ?? ''}}" class="form-control">
    <div id="price-error-msg" style="color:red;"></div>
</div>

<div class="form-group pb-3">
    <label for="qty" class="pb-1 h5">Quantity</label>
    <input type="text" id="item-qty" name="qty" value="{{old('qty') ?? ''}}" class="form-control">
    <div id="qty-error-msg" style="color:red;"></div>
</div>

@csrf
