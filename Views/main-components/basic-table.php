<?php
function generateTable($titles, $data): void
{
    echo '<div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead><tr class="text-white">';
    for ($i = 0; $i <= count($titles) - 1; $i++) {
        echo '<th scope="col">' . $titles[$i] . '</th>';
    }
    echo '</tr></thead><tbody>';
    foreach ($data as $crow) {
        echo '<tr>';
        foreach ($crow as $cdata) {
            echo '<td>';
            echo $cdata; //TODO: Replace w/ object acces based on row title
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}
function generateBasicTable($titles, $data): string
{
    $result = " ";
    $result .= '<table class="table">
            <thead><tr>';
    for ($i = 0; $i <= count($titles) - 1; $i++) {
        $result .= '<th scope="col">' . $titles[$i] . '</th>';
    }
    $result .= '</tr></thead><tbody>';
    foreach ($data as $crow) {
        $result .= '<tr>';
        foreach ($crow as $cdata) {
            $result .= '<td>';
            $result .= $cdata; //TODO: Replace w/ object acces based on row title
            $result .= '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</tbody></table>';
    return $result;
}

?>

