<?php
function whereCreate($key,$val,&$arrayexecute){
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
?>