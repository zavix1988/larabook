@foreach ($authors as $author)

  <option value="{{$author->id}}">{{$author->name}}</option>
@endforeach
