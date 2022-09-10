<?php
foreach($rows as $key => $row):
    $content = explode(" | ", $row['dr_detail']);
    $more = explode(" | ", $row['dr_list']);
    foreach($more as $list){
        $x = $x. "'".$list."',";
    }
    echo '
        {
            id: "'.$key.'",
            name: "'.$content[0].'",
            position: "'.$content[1].'",
            imgBig: "'.$content[2].'",
            imgThumb: "'.$content[3].'",
            info: `
                ['.$x.']
                `
        },
    ';
endforeach;
?>