<?php

/**
 * @param array $ranges
 * @return array
 */
function foo($ranges)
{
    sort($ranges);

    $res = [];
    $current = $ranges[0];

    foreach ($ranges as $array) {
        if ($array[0] <= $current[1]) {
            $current[1] = max($current[1], $array[1]);
        } else {
            $res[] = $current;
            $current = $array;
        }
    }
    $res[] = $current;
    return $res;
}

function validate($ranges) {
    foreach ($ranges as $array) {
        if ($array[0] > $array[1]) {
            echo "Les valeurs du tableau ne sont pas valides\n";
            exit;
        }
    }
    return true;
}


echo "1 - [[0, 3], [6, 10]]\n";
echo "2 - [[0, 5], [3, 10]]\n";
echo "3 - [[0, 5], [2, 4]]\n";
echo "4 - [[7, 8], [3, 6], [2, 4]]\n";
echo "5 - [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]\n";
echo "6 -  Custom\n";
$a = readline("Choissisez un tableau de votre choix :\n");

switch ($a) {
    case '1':
        print_r(foo([[0, 3], [6, 10]]));
        break;

    case '2':
        print_r(foo([[0, 5], [3, 10]]));
        break;
    
    case '3':
        print_r(foo([[0, 5], [2, 4]]));
        break;
    
    case '4':
        print_r(foo([[7, 8], [3, 6], [2, 4]]));
        break;
    
    case '5':
        print_r(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]));
        break;
        
    case '6':
        $b = json_decode(readline("Entrez votre tableau :\n"));
        validate($b);
        print_r(foo($b));
        break;
    default:
        print_r(foo([[0, 3], [6, 10]]));
        break;
}
