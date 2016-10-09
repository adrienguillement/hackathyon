<?php
function addDate($date)
{
    $jour=intval(substr($date,0,2));
    $mois=intval(substr($date,3,2));
    $annee=intval(substr($date,6,4));

    $jour++;

    if($mois==1 || $mois==3 || $mois==5 || $mois==7 || $mois==8 || $mois==10 || $mois==12)
    {
        if($jour==32)
        {
            $jour=1;
            if($mois==12)
            {
                $mois=1;
                $annee++;
            }else
            {
                $mois++;
            }
        }
    }elseif($mois==2)
    {
        if($jour==30)
        {
            $jour=1;
            $mois++;
        }
    }else
    {
        if($jour==31)
        {
            $jour=1;
            $mois++;
        }
    }

    if($jour<10)
    {
        $jour='0'.strval($jour);
    }
    else {
        $jour=strval($jour);
    }

    if($mois<10)
    {
        $mois='0'.strval($mois);
    }else{
        $mois=strval($mois);
    }

    $annee=strval($annee);

    $dateF=$jour.'/'.$mois.'/'.$annee;

    return $dateF;
}
