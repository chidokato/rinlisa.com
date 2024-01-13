<?php use App\Models\Option; ?>
@foreach($data as $val)
<div class="col-md-2">
    <div class="form-group">
        <label>{{$val->name}}: </label>
    </div>
</div>
<div class="col-md-10 customize">
    <div class="form-group">
        @foreach(Option::where('parent', $val->id)->get() as $key => $subO)
        <label> <input value="{{$subO->name}}" class="form-check-input" {{$key == 0 ? 'checked' : ''}} type="radio" name="{{$val->sku}}"> {{$subO->name}}</label>
        @endforeach
    </div>
</div>
@endforeach
