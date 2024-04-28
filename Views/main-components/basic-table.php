<?php
function generateTable(array $row_titles, array $display_objects): void
{

    echo '<div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead><tr class="text-white">';
    for ($i = 0; $i <= count($row_titles) - 1; $i++) {
        echo '<th scope="col">' . $row_titles[$i] . '</th>';
    }
    echo '</tr></thead><tbody>';
    for ($i = 0; $i < count($display_objects) - 1; $i++) {
        echo '<tr>';
        for ($j = 0; $j <= count($row_titles) - 1; $j++) {
            echo '<td>';
            echo $display_objects[$j]; //TODO: Replace w/ object acces based on row title
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}
?>

