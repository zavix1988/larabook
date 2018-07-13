<div class="form-group">
	<label for="">Имя автора</label>
	<input type="text" class="form-control" name="name" placeholder="Автор" value="{{$author->name or ""}}" required>
</div>
<div class="form-group">
	<label for="">Slug</label>
	<input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$author->slug or ""}}" required>
</div>
<div class="form-group">
	<label for="">Автор Жив?</label>
	<select name="alive" class="form-control">
		<option value="1">Жив</option>
		<option value="0">Умер</option>
	</select>
</div>
 <button type="submit" class="btn btn-primary">Сохранить</button>
