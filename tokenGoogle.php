<?php
    require "vendor/autoload.php";
    include "Autoload.php";
    include "funct/session.php";

    $token = $_POST['token'];
    $apiKey="366c96a0e39ce9b585eaa340f38ddbcce5f16c43";

    $fields = array(
        'token' => $token,
        'apiKey' => $apiKey
    );
    $fields_string="";

    //url-ify the data for the POST
    foreach($fields as $key=>$value){
        $fields_string .= $key.'='.$value.'&'; 
    }
    rtrim($fields_string, '&');

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://rpxnow.com/api/v2/auth_info');
    curl_setopt($curl, CURLOPT_POST, count($fields));
    curl_setopt($curl, CURLOPT_POSTFIELDS,$fields_string);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $profileString = curl_exec($curl);
    if (!$profileString){
        $_SESSION['message']= '<p>Curl error: ' . curl_error($curl);
        $_SESSION['message'].='<p>HTTP code: ' . curl_errno($curl);
    } else {
        $profile = json_decode($profileString);
        if (property_exists($profile, 'err')) {
            $_SESSION['message']= '<p>Engage error: ' . $profile->err->msg;
        } else {
            if (property_exists($profile->profile, 'displayName')) {
                $_SESSION['googleUser'] = $profile;
            } else {
                $_SESSION['googleUser'] = '(Anonymous Coward)';
            }

            $email=$_SESSION['googleUser']->profile->email;
            $identifer=$_SESSION['googleUser']->profile->identifier;
            $nom=$_SESSION['googleUser']->profile->displayName;
            $post=array("email"=>$email,"googleIdentifier"=>$identifer);
            $oClient=new Client($post);
            var_dump($oClient);
            $mClient=Manager::getInstance();
            $mClient::setTable("Client");

            $client=$mClient::lister(array("googleIdentifier"=>$identifer),[],false);
            if(count($client)){
                 $_SESSION['user']=$client[0];
            }
            else{
                $idClient=$mClient::enregistrer($oClient)[1];
                $_SESSION['user']['email']=$oClient->Email();
                $_SESSION['user']['nom']=$oClient->Nom();
                $_SESSION['user']['idClient']=$idClient;
            }
            header("location:/");
        }
    }
    curl_close($curl);
?>