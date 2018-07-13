<div class="form-group">
	<label for="">Название Жанра</label>
	<input type="text" class="form-control" name="name" placeholder="Автор" value="{{$genre->name or ""}}" required>
</div>
<div class="form-group">
	<label for="">Slug</label>
	<input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$genre->slug or ""}}" required>
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>
