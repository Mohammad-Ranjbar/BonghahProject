{!! csrf_field() !!}

<div class="form-group">
    <label for="street">Street</label>
    <input type="text" class="form-control" name="street" id="street" value="{{old('street')}}">
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}">
</div>

<div class="form-group">
    <label for="zip">Zip/Postal Code</label>
    <input type="text" class="form-control" name="zip" id="zip" value="{{old('zip')}}">
</div>

<div class="form-group">
    <label for="country">Country</label>
    <select name="country" id="country" class="form-control" >

        @foreach($countries as $country=>$code)

            <option value="{{$code}}">{{$country}}</option>

        @endforeach

    </select>
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" name="state" id="state" value="{{old('state')}}">
</div>

<hr>
<div class="form-group">
    <label for="price">Selling Price</label>
    <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
</div>

<div class="form-group">
    <label for="description">Home Description</label>
    <textarea class="form-control" name="description" id="description"  rows="10">{{old('description')}}</textarea>

</div>



{{--<div class="form-group">--}}
    {{--<label for="photos">Photos</label>--}}
    {{--<input type="file" class="form-control" name="photos" id="photos" >--}}
{{--</div>--}}

<div class="form-group">
    <button type="submit"  class="btn btn-primary">Create Banner</button>
</div>
