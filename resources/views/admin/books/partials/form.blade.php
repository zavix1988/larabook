<div class="form-group">
	<label for="">Название книги</label>
	<input type="text" class="form-control" name="name" placeholder="Название" value="{{$book->name or ""}}" required>
</div>
<div class="form-group">
	<label for="">Цена</label>
	<input type="text" class="form-control" name="price" placeholder="Цена" value="{{$book->price or ""}}" required>
</div>
<div class="form-group">
	<label for="">Кол-во страниц</label>
	<input type="text" class="form-control" name="pages" placeholder="Кол-во страниц" value="{{$book->pages or ""}}" required>
</div>
<div class="form-group">
	<label for="">Slug</label>
	<input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$book->slug or ""}}" required>
</div>
<div class="form-group">
	<label for="">Язык</label>
	<select name="lang" class="form-control">
		<option value="RUS">RUS</option>
		<option value="UKR">UKR</option>
		<option value="ENG">ENG</option>
	</select>
</div>
<label for="">Автор</label>
<select name="authors[]" class="form-control"  multiple="">
		@include('admin.books.partials.authors', ['authors' => $authors])
</select>
<label for="">Жанр</label>
<select name="genres[]" class="form-control"  multiple="">
	@include('admin.books.partials.genres', ['genres' => $genres])
</select>
 <button type="submit" class="btn btn-primary">Сохранить</button>
