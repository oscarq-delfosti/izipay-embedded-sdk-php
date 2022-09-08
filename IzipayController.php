<?php
require_once "IzipayModel.php";
$valorcod64 = "$KEY_USER:$KEY_PASSWORD";
$cod64 = base64_encode($valorcod64);
$basic = "Authorization: Basic $cod64";
$contentype = "Content-Type: application/json";
$headers = [$basic,$contentype];
$body = "";
$body = json_encode([
         "amount" => 180,
         "currency" => "PEN",
         "formAction" => "PAYMENT",
         "orderId" => "MICUENTA-".rand(100000,999999),
         "customer" => [
             "email" => $_POST['txt_email'],
             "billingDetails" => [
                 "firstName" => $_POST['txt_name'],
                 "lastName" => $_POST['txt_lastname'],
                 "phoneNumber" => "987876123",
                 "address" => "AV LIMA 123",
                 "address2" => "AV LIMA 1234"
             ]
         ]
     ]);
function pago($URL_BASE,$body,$headers){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$URL_BASE);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$body);  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    $valordevuelto = json_decode($server_output,true);
    $formtoken = $valordevuelto['answer']['formToken'];
    return $formtoken;
}
$valor = pago($URL_BASE,$body,$headers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Izipay - Pasarela</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.console = window.console || function (t) { };
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
    <link rel="stylesheet" 
    href="css/classic-reset.css">
    <script 
    src="js/classic.js">
    </script>
    <script 
    src="https://api.micuentaweb.pe/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
    kr-language="es"
    kr-public-key="<?=$KEY_JS?>"></script>
    <style>
        .kr-whitelabel-logo{
            display: none !important;
        }
    </style>
</head>
<body class="body-izi">
    <div class="form-izi">
        <img src="img/izipay3.png" class="logo-png" alt="">
        <div id="valdas" class="kr-embedded" kr-form-token="<?=$valor?>">
            <div class="kr-pan"></div>
            <div class="kr-expiry"></div>
            <div class="kr-security-code"></div>
            <!-- payment form submit button -->
            <button class="kr-payment-button"></button>
            <!-- error zone -->
            <div class="kr-form-error"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var cont = 0;
        KR.onError( function(event) {
            var code = event.errorCode;
            console.log(event);
            console.log(event.detailedErrorMessage);
            console.log(code);
            console.error(cont);
            if(code != null){
                cont = cont + 1;
            }

            if(cont>1){
                console.log("se cancelo");
                document.getElementById("valdas").style.display = "none";
            }
        });
        
        KR.onSubmit( function(event) {
            console.log(event.hashAlgorithm.toString());
            console.log(event.rawClientAnswer);
            console.log(event.hashKey.toString());
            console.log(event.hash.toString());
            $.ajax({
                url : 'validador.php',
                data : { 
                    kr_hash_algorithm : event.hashAlgorithm.toString(),
                    kr_answer : event.rawClientAnswer,
                    kr_hash_key : event.hashKey.toString(),
                    kr_hash : event.hash.toString()
                },
                type : 'POST',
                dataType : 'json',
                success : function(json) {
                    if (json == 'true')
                    {
                        Swal.fire(
                        'Resultado',
                        'Autorizacion Exitosa!',
                        'success'
                        )
                    }
                },
                error : function(xhr, status) {
                    console.log(xhr);
                    console.log(xhr + ' ' + status);
                    alert('Disculpe, existió un problema');
                }
            });
        return false;
        });
    </script>
</body>
</html>

