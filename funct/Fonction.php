<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Fonction{
	
	static function bodyMail($token){
		$bodymessage="";
		$bodymessage.="Bienvenue chez MyMarket\n";
		$bodymessage.="\nVeuillez confirmer votre inscription en cliquant sur ce lien :\n";
		$bodymessage.='http://'.$_SERVER['HTTP_HOST']."?token=".$token."\n";
		$bodymessage.="\nVous pouvez ignorer cet email s'il ne vous concerne pas\n";
		$bodymessage.="\nhttp://".$_SERVER['HTTP_HOST']."\n";
		return $bodymessage;
	}

	static function sendMail($title,$expediteur,$body,$from=array('mymarket@mymarket.com' => 'MyMarket')){
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, "tls")
		  							->setUsername('MyMarketBoutique@gmail.com')
		                            /*->setPassword('MyMarketBoutique123456')*/
		                            ->setPassword('nyssksdnimxgwtvi')
		                            ->setStreamOptions([
									            'ssl' => [
									                'verify_peer' => false,
									                'allow_self_signed' => true
									            ]
									        ]);

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance($title)
		  ->setFrom($from)
		  ->setTo(array($expediteur))
		  ->setBody($body);

		$result = $mailer->send($message);
		return $result;
	}

	static function whereCreate($key,$val,&$arrayexecute){
		$comparateur="=";
		if($val===null or $val=="null"){
			return $key." is null";
		}
		elseif($val=="not null"){
			return $key." is not null";
		}
		else{
			if(strpos($val,"<")!==false){
				$comparateur="<=";
				$val=str_replace("<","",$val);
			}
			elseif(strpos($val,">")!==false){
				$comparateur=">=";
				$val=str_replace(">","",$val);
			}
			elseif(strpos($val,"%")!==false){
				$comparateur=" like ";
			}
			elseif(strpos($val,"!")!==false){
				$comparateur=" != ";
				$val=str_replace("!","",$val);
			}
			$where=str_replace("_","",$key);
			if(count(explode(".",$key))>1)
				$key=explode(".",$key)[1];
			$where.="$comparateur:$key";

			$arrayexecute[$key]=$val;
			return $where;
		}
	
	}
}

?>