<div class="form-group pb-3">
    <label for="name" class="pb-1 h5">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $item->name}}" class="form-control">
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group pb-3">
    <label for="email" class="pb-1 h5">URL</label>
    <input type="text" name="url" value="{{old('url') ?? $item->url}}" class="form-control">
    <div>{{$errors->first('url')}}</div>
</div>

<div class="form-group pb-3">
    <label for="email" class="pb-1 h5">Price</label>
    <input type="text" name="price" value="{{old('price') ?? $item->price}}" class="form-control">
    <div>{{$errors->first('price')}}</div>
</div>

<div class="form-group pb-3">
    <label for="email" class="pb-1 h5">Quantity</label>
    <input type="text" name="qty" value="{{old('qty') ?? $item->qty}}" class="form-control">
    <div>{{$errors->first('qty')}}</div>
</div>


@csrf
