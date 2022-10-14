<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $customer->name}}" class="form-control">
    <div>{{$errors->first('name')}}</div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{old('email') ?? $customer->email}}" class="form-control">
        <div>{{$errors->first('email')}}</div>
    </div>
</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{$customer->active == $activeOptionValue? 'selected' : ''}}>{{ $activeOptionValue }}</option>
        @endforeach

    </select>
    <div>{{$errors->first('active')}}</div>
</div>

<div class="form-group">
    <label for="company_id">Status</label>
    <select name="company_id" id="company_id" class="form-control">
        <ul>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{$customer->company->id == $company->id ? 'selected' : ""}}>{{ $company->name }}</option>
            @endforeach
        </ul>
    </select>
</div>

@csrf
