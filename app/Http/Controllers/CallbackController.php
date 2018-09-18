<?php

namespace App\Http\Controllers;

use App\Mail\MailSending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Zttp\Zttp;


class CallbackController extends Controller
{

	/**
	 * Вывод формы отправки письма
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function all()
	{
 		return view('user.callback.index');
	}

	/**
	 * Проверка каптчи и отправка письма
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function callBack(Request $request)
	{

		
	 	$name = $request->name;
		$phone = $request->phone;
		$email = $request->email;
		$msg = $request->msg;

	
		/* Отправка запроса на проверку каптчи */
		$response = Zttp::asFormParams()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret' => config('captcha.captcha.secret'),
			'response' => request('g-recaptcha-response'),
			'remoteip' => request()->ip(),
		]);


		/* Проверка ответа каптчи */
		if($response->json()['success'] !== true){
		   
		   return redirect()->back()->withFlashMessage('Извените! Ваше сообщение не было отправлено, Вам нужно поставить отметку в поле "Я не робот"');
		}else
		{
			return view('user.callback.sending', [
				Mail::to('zavix1988@gmail.com')->send(new MailSending($name, $phone, $email, $msg))
			]);
		}
	}
}
