@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{$book?->name}}" type="text" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Copies sold</label>
    <input name="copies_sold" value="{{$book?->copies_sold}}" type="number" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Published at</label>
    <input name="published_at" type="date" value="{{$book?->published_at?->format('Y-m-d')}}" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
