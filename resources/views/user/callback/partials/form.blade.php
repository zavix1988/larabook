<label>Имя: </label><br>
<input type="text"  placeholder=" Введите ваше имя " name="name" required><br>
<label>Телефон: </label><br>
<input type="tel" placeholder=" +38 (___) ___ __ __ " minlength="13" maxlength="13" name="phone" required><br>
<label>Email: </label><br>
<input type="email"  placeholder=" name@domain.com " name="email" required><br>
<label>Ваш вопрос: </label><br>
<textarea name="msg"  placeholder=" Текст сообщения " cols="30" rows="5" required></textarea><br>
<div class="g-recaptcha" data-sitekey="{{config('captcha.captcha.key')}}"></div>
<button type="submit" class="btn btn-primary">Отправить</button>
