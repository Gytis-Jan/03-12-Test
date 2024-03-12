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

    print_r(trysx(150));
?>