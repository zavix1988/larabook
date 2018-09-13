@foreach ($authors as $author)

<option value="{{$author->id}}"
	@if (isset($book->authors))
		@foreach($book->authors as $bookauthor)
			@if ($author->id == $bookauthor->id)
				 selected="selected"
		 	@endif
		@endforeach
	@endif
	>{{$author->name}}</option>
@endforeach
