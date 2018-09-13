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
	<label for="">Дата публикации</label>
	<input type="text" class="form-control" name="pubyear" placeholder="Дата публикации" value="{{$book->pubyear or ""}}" required>
</div>
<div class="form-group">
	<label for="">Описание</label>
	<textarea class="form-control" rows="8" cols="80" name="description" placeholder="Описание" required>{{$book->description or ""}}</textarea>
</div>
<div class="form-group">
	<label for="">Язык</label>
	<select name="lang" class="form-control">
		<option value="RUS">RUS</option>
		<option value="UKR">UKR</option>
		<option value="ENG">ENG</option>
	</select>
</div>
<!--
<div class="form-group">
	<label for="image">Выберите картинку</label>
	<input type="file" class="form-control-file" name="image" id="image">
</div> -->
<label for="">Автор</label>
<select name="authors[]" class="form-control"  multiple="">
	@include('admin.books.partials.authors', ['authors' => $authors])
</select>
<label for="">Жанр</label>
<select name="genres[]" class="form-control"  multiple="">
	@include('admin.books.partials.genres', ['genres' => $genres])
</select>
<button type="submit" class="btn btn-primary">Сохранить</button>
