@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" type="text" class="form-control" value="{{$author?->name ?? ""}}">
</div>
<div class="mb-3">
    <label class="form-label">Has rocket launcher</label>
    <select class="form-select" name="has_rocket_launcher">
        <option value="0" {{$author?->has_rocket_launcher ? '' : 'selected'}}>No</option>
        <option value="1" {{$author?->has_rocket_launcher ? 'selected' : ''}}>Yes</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
