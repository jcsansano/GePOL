<?php

function pujarImatge($files){
    $pesImg=300;  //en kbytes
    $missatgeCarrega='';
    if(strlen($files['imatge']['tmp_name'])>0){
        $imgPermeses=[1,2,3,4,5,6,7,8];
        $temporal = $files["imatge"]["tmp_name"];
        $propietats= getimagesize($files['imatge']['tmp_name']);
        $desti ="./fotos/" . $files["imatge"]["name"];
        $missatgeCarrega.=(isset($files['imatge']['name']) 
            && $files['imgArt']['size']==0)?"- No te contingut.<br/>":"";
        $missatgeCarrega.=($files['imgArt']['size']>($pesImg*1024))?"- Pes superior a ".$pesImg."Kb.<br/>":"";
        $missatgeCarrega.=   
                (in_array($propietats[2], $imgPermeses))?"":"- Tipus de arxiu no permés";
        if($missatgeCarrega==""){ 
            if (move_uploaded_file($temporal, $desti)) {
                $missatgeCarrega="L'axiu ".$files["imgArt"]["name"]."s'ha carregat correctament.";
            }else {
                $missatgeCarrega="S'ha produït un error en la carrega de l'arxiu ".$files["imgArt"]["name"];
            }
        }else{
            $missatgeCarrega="Problemes amb l'arxiu triat:<br>".$missatgeCarrega;
        }
    }
    return $missatgeCarrega;
}