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
function generateBasicTable($result_object): string
{
    $result = "<head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
        </head>";
    $rows = $result_object->fetch_fields();
    $row_titles = [];
    foreach ($rows as $val) {
        array_push($row_titles, $val->name);
    }
    $data = $result_object->fetch_all();
    $result .= '<div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead><tr class="text-white">';
    for ($i = 0; $i <= count($row_titles) - 1; $i++) {
        $result .= '<th scope="col">' . $row_titles[$i] . '</th>';
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
    $result .= '</tbody></table></div>';
    return $result;
}

?>

