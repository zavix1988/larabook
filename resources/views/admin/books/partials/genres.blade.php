@foreach ($genres as $genre)
<option value="{{$genre->id}}"
	@if (isset($book->genres))
		@foreach($book->genres as $bookgenre)
			@if ($genre->id == $bookgenre->id)
				 selected="selected"
		 	@endif
		@endforeach
	@endif
	>{{$genre->name}}</option>
@endforeach
