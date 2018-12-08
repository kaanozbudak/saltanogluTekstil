<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>PHPMailer ile E-posta Gönderimi (DEMO) - Erbilen.NET</title>
	
	<style type="text/css">
	* {
		padding: 0; margin: 0; list-style: none; border: none; font-family: Arial; font-size: 14px
	}
	textarea, input {
		border: 1px solid #ddd;
		border-top-color: #aaa;
		border-left-color: #aaa;
		padding: 7px;
		resize: none
	}
	input:focus, textarea:focus {
		outline: 1px solid #205ec1
	}
	button {
		background: #205ec1;
		color: #fff;
		padding: 7px 13px;
		cursor: pointer
	}
	form {
		width: 400px;
		margin: 20px auto;
		background: #f9f9f9;
		padding: 10px;
		border: 1px solid #ddd;
		border-top-color: #aaa;
		border-left-color: #aaa
	}
	form h3 {
		font-size: 21px;
		font-weight: normal;
		margin-bottom: 10px;
		border-bottom: 1px solid #ddd;
		padding-bottom: 10px
	}
	table tr td {
		padding: 6px
	}
	.success {
		border: 1px solid green;
		color: green;
		padding: 10px;
		margin: 20px auto;
		width: 400px
	}
	.error {
		border: 1px solid red;
		color: red;
		padding: 10px;
		margin: 20px auto;
		width: 400px
	}
	</style>
	
</head>
<body>

<?php

	if ( $_POST ){
	
		$adsoyad = htmlspecialchars(trim($_POST['adsoyad']));
		$eposta = htmlspecialchars(trim($_POST['eposta']));
		$mesaj = htmlspecialchars(trim($_POST['mesaj']));
	
		include 'class.phpmailer.php';
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'mail.saltanoglutekstil.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'GÖNDEREN_EPOSTA_ADRESİ';
		$mail->Password = 'EPOSTA_ŞİFRESİ';
		$mail->SetFrom($mail->Username, 'Tayfun Erbilen');
		$mail->AddAddress($eposta, $adsoyad);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'E-POSTA KONUSU';
		$content = '<div style="background: #eee; padding: 10px; font-size: 14px">'.$mesaj.'</div>';
		$mail->MsgHTML($content);
		if($mail->Send()) {
			// e-posta başarılı ile gönderildi
			echo '<div class="success">E-posta başarıyla gönderildi, lütfen kontrol edin.</div>';
		} else {
			// bir sorun var, sorunu ekrana bastıralım
			echo '<div class="error">'.$mail->ErrorInfo.'</div>';
		}
	
	}
	
?>

<form action="" method="post">
	<h3>E-Posta Gönder</h3>
	<table>
		<tr>
			<td width="70">E-Posta</td>
			<td><input type="text" name="eposta" style="width: 200px" /></td>
		</tr>
		<tr>
			<td>Ad-Soyad</td>
			<td><input type="text" name="adsoyad" style="width: 200px" /></td>
		</tr>
		<tr>
			<td>Mesaj</td>
			<td><textarea name="mesaj" cols="40" rows="5"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit">Gönder</button></td>
		</tr>
	</table>
</form>

</body>
</html>