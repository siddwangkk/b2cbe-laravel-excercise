<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $item->name}}" class="form-control">
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group">
    <label for="email">url</label>
    <input type="text" name="url" value="{{old('url') ?? $item->url}}" class="form-control">
    <div>{{$errors->first('url')}}</div>
</div>

<div class="form-group">
    <label for="email">price</label>
    <input type="text" name="price" value="{{old('price') ?? $item->price}}" class="form-control">
    <div>{{$errors->first('price')}}</div>
</div>

<div class="form-group">
    <label for="email">quantity</label>
    <input type="text" name="qty" value="{{old('qty') ?? $item->qty}}" class="form-control">
    <div>{{$errors->first('qty')}}</div>
</div>


@csrf
