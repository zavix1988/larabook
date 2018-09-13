<div class="form-group">
	<label for="">Имя автора</label>
	<input type="text" class="form-control" name="name" placeholder="Автор" value="{{$author->name or ""}}" required>
</div>
<div class="form-group">
	<label for="">Дата рождения</label>
	<input type="text" class="form-control" name="birthyear" placeholder="Дата рождения" value="{{$author->birthyear or ""}}" required>
</div>

 <button type="submit" class="btn btn-primary">Сохранить</button>
