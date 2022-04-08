<?php
	require_once "IzipayModel.php";
	function validacion($KEY_PASSWORD,$KEY_SHA256,$key=null)
	{
		$validador = array('sha256_hmac');
		if(!in_array($_POST['kr_hash_algorithm'],  $validador)){
			die('HUBO UN PROBLEMA');
		}
		// EN CASO DE QUE NO FUNCIONE
		$krAnswer = str_replace('\/', '/', $_POST['kr_answer']);

		if (is_null($key)) {
	        if ($_POST['kr_hash_key'] == "sha256_hmac") {
	            $key = $KEY_SHA256;
	        } else if ($_POST['kr_hash_key'] == "password") {
	            $key = $KEY_PASSWORD;
	        } else {
	            die('OCURRIO UN ERROR INESPERADO');
	        }
	    }
	    $calculatedHash = hash_hmac('sha256', $krAnswer, $key);
	    if ($calculatedHash == $_POST['kr_hash']) return 'true';
	    $calculatedHash = hash_hmac('sha256', stripslashes($krAnswer), $key);
	    if ($calculatedHash == $_POST['kr_hash']){
	    	return 'true';
	    }
	    return 'false';
	}

	if (validacion($KEY_PASSWORD,$KEY_SHA256,null) == 'true')
	{
		$jsonanswer = json_decode($_POST['kr_answer'],true);
		$token = $jsonanswer['transactions'][0]['paymentMethodToken'];
		if( $token != null )
		{
			save_token($token);
		}
		echo json_encode(validacion($KEY_PASSWORD,$KEY_SHA256,null));
	}
	
?>