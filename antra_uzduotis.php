<?php
    function trysx($x)
    {
        $seka = [$x];

        if ($x < 1)
        {
            return [];
        }

        while ($x > 1)
        {
            if ($x % 2 == 0)
            {
                $x = $x / 2;
            }

            else
            {
                $x = 3 * $x + 1;
            }

            array_push($seka, $x);
        }

        return $seka;
    }

    function Inte ($start , $end)
{
    $rezMas = [];
    $maxReiksmesSkaicius = null;
    $maxIteracijuSkaicius = null;
    $minIteracijuSkaicius = null;

    $maxReiksme = -1;
    $maxIteracija = -1;
    $minIteracija = PHP_INT_MAX;

    for ($i = $start; $i <= $end; $i++)
    {
        $eiga = trysx($i);
        $iteracijos = count($eiga);
        $maxReiksmeTemp = max($eiga);

        // Atnaujina max reiksmes
        if ($maxReiksmeTemp > $maxReiksme) {
            $maxReiksme = $maxReiksmeTemp;
            $maxReiksmesSkaicius = $i;
        }

        // Atnaujina max iteracijas
        if ($iteracijos > $maxIteracija) {
            $maxIteracija = $iteracijos;
            $maxIteracijuSkaicius = $i;
        }

        // Taspats, tik min iteracijos
        if ($iteracijos < $minIteracija) {
            $minIteracija = $iteracijos;
            $minIteracijuSkaicius = $i;
        }

        $rezultatuMasyvas[] = [
            'skaicius' => $i,
            'iteracijos' => $iteracijos,
            'maxReiksme' => $maxReiksmeTemp,
            'eiga' => $eiga,
        ];
    }

    return [
        'visiRezultatai' => $rezultatuMasyvas,
        'maxReiksmesSkaicius' => $maxReiksmesSkaicius,
        'maxIteracijuSkaicius' => $maxIteracijuSkaicius,
        'minIteracijuSkaicius' => $minIteracijuSkaicius,
    ];
}

//Naujas komentaras

$rezultatai = Inte(1, 25);
$intervaluResultatai = $rezultatai['visiRezultatai'];
$maxReiksmesSkaicius = $rezultatai['maxReiksmesSkaicius'];
$maxIteracijuSkaicius = $rezultatai['maxIteracijuSkaicius'];
$minIteracijuSkaicius = $rezultatai['minIteracijuSkaicius'];

print("<b>3 Svarbus rezultatai:</b><br>");
print("Skaicius pasiekes didziausia reiksme : $maxReiksmesSkaicius <br>");
print("Skacius su daugiausia iteraciju : $maxIteracijuSkaicius <br>");
print("Skaicius su maziausia iteraciju : $minIteracijuSkaicius <br><br>");

// Intervalo rezultatai
foreach ($intervaluResultatai as $rez)
{
    print( "<b>Skaicius:</b> {$rez['skaicius']}, <b>Iteraciju Kiekis:</b> {$rez['iteracijos']}, <b>Max Reiksme:</b> {$rez['maxReiksme']}  <b>Eiga:</b> " . implode(', ', $rez['eiga']) . "<br><br>");
}
?>