<!--  -->
<?php

$i = 2;

while ($i <= 20) {
    echo $i;
    $i += 2;
    echo "\n";
}

?>

<!-- Sintaxe alternatina -->

<?php

$i = 2;

while ($i <= 20) : echo $i;
    $i += 2;
    echo "\n";
endwhile;

?>