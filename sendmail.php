<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Excection;
	
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);
	
	// От кого письмо
	$mail->setFrom('limon1626@yandex.ru', 'Womazing');
	// Кому отправить
	$mail->addAddress('tramplin900@gmail.com');
	// Тема письма
	$mail->Subject = 'Привет! Это "Степанов Роман"';
	
	// Рука 
	$hand = "Правая";
	if($_POST['hand'] == "left"){
		$hand = "Левая";
	}
	
	// Тело письма
	$body = '<h1>Встречайте супер письмо!</h1>';
	
	if(trim(!empty($_POST['name']))){
		$body.='<p><strog>Имя:</strog> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strog>E-mail:</strog> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['hand']))){
		$body.='<p><strog>Рука:</strog> '.$_hand.'</p>';
	}
	if(trim(!empty($_POST['age']))){
		$body.='<p><strog>Возраст:</strog> '.$_POST['age'].'</p>';
	}
	
	if(trim(!empty($_POST['message']))){
		$body.='<p><strog>Сообщение:</strog> '.$_POST['message'].'</p>';
	}
	
	// Прикрепить файл
	if(!empty($_FILES['image']['tmp_name'])) {
		// путь загрузки файла
		$filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
		// грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	
	$mail->Body = $body;
	
	// Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}
	
	$response = ['message' => $message];
	
	header('Content-type: application/json');
	echo json_encode($response);
?>