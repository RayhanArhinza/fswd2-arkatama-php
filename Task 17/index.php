<!-- Soal No 1-2 -->
<?php

function upside_left_triangle($n)
{
    echo "\nTriangle upside left\n";
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }
        echo "\n";
    }
}

// contoh penggunaan
upside_left_triangle(5);

function upside_right_triangle($n)
{
    echo "\nTriangle upside right\n";
    for ($i = 1; $i <= $n; $i++) {
        // menambahkan spasi kosong
        for ($j = 1; $j <= $n - $i; $j++) {
            echo "  ";
        }
        // mencetak bintang
        for ($k = 1; $k <= $i; $k++) {
            echo "* ";
        }
        echo "\n";
    }
}


// contoh penggunaan
upside_right_triangle(5);

function downside_left_triangle($n)
{
    echo "\nTriangle downside left\n";
    for ($i = $n; $i >= 1; $i--) {
        for ($j = $i; $j >= 1; $j--) {
            echo "* ";
        }
        echo "\n";
    }
}

// contoh penggunaan
downside_left_triangle(5);

function downside_right_triangle($n)
{
    echo "\nTriangle downside right\n";
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j < $i; $j++) {
            echo "  ";
        }
        for ($k = $n; $k >= $i; $k--) {
            echo "* ";
        }
        echo "\n";
    }
}

// contoh penggunaan
downside_right_triangle(5);
function soal2($b)
{
    echo "\nsoal 2 \n";
    switch ($b) {
        case "upside_left_triangle":
            upside_left_triangle(5);
            break;
        case "upside_right_triangle":
            upside_right_triangle(5);
            break;
        case "downside_left_triangle":
            downside_left_triangle(5);
            break;
        case "upside_right_triangle":
            downside_right_triangle(5);
            break;
        default:
            echo "salah input";
    }
}

soal2("upside_left_triangle")
?>

<!-- Soal No 3 -->
<?php

function upside_left_triangle($rows = 5, $symbol = '* ')
{
    echo "\nTriangle upside left\n";
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $symbol;
        }
        echo "\n";
    }
}

// contoh penggunaan
upside_left_triangle();

function upside_right_triangle($rows = 5, $symbol = '*', $spacing = 2)
{
    echo "\nTriangle upside right\n";
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= ($rows - $i) * $spacing; $j++) {
            echo " ";
        }

        for ($k = 1; $k <= $i; $k++) {
            echo $symbol . " ";
        }
        echo "\n";
    }
}



// contoh penggunaan
upside_right_triangle();

function downside_left_triangle($rows = 5, $symbol = '* ')
{
    echo "\nTriangle downside left\n";
    for ($i = $rows; $i >= 1; $i--) {
        for ($j = $i; $j >= 1; $j--) {
            echo $symbol;
        }
        echo "\n";
    }
}

// contoh penggunaan
downside_left_triangle();

function downside_right_triangle($rows = 5, $symbol = '* ')
{
    echo "\nTriangle downside right\n";
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j < $i; $j++) {
            echo "  ";
        }
        for ($k = $rows; $k >= $i; $k--) {
            echo $symbol;
        }
        echo "\n";
    }
}

// contoh penggunaan
downside_right_triangle();
function printSegitiga($b)
{
    echo "\nprint segitiga \n";
    switch ($b) {
        case "upside_left_triangle":
            upside_left_triangle();
            break;
        case "upside_right_triangle":
            upside_right_triangle();
            break;
        case "downside_left_triangle":
            downside_left_triangle();
            break;
        case "upside_right_triangle":
            downside_right_triangle();
            break;
        default:
            echo "salah input";
    }
}

printSegitiga("upside_left_triangle")
?>