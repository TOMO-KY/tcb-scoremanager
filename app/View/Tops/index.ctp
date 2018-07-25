<div>
<?php echo __FILE__; ?>
</div>
<hr>

<?php
if( isset($results[0]['User']) ) { 
    _tops_index_show_user_list_table( $results );
}
else { 
    _tops_index_show_no_list_message( $results );
}
?>


<?php

function _tops_index_show_user_list_table( $results ) {
$output = <<< EOS
    <table>
    <thead>
    <tr>
    %s
    </tr>
    </thead>
    <tbody>
    %s
    </tbody>
    </table>
EOS;

    echo sprintf( $output, _tops_index_get_table_head( $results ), _tops_index_get_table_list( $results ) );

}


function _tops_index_show_no_list_message( $results ) {
    echo '<br>リスト無し<br>';
}


function _tops_index_get_table_head( $results ) {
    $output = '';
    foreach( array_keys($results[0]['User']) as $item_name) {
        $output .= '<td>'. h($item_name) .'</td>'."\n";
    }
    return $output;
}


function _tops_index_get_table_list( $results ) {
    $output = '';
    foreach($results as $one_results) {
        
        $output .= '<tr>';
        
        foreach( $one_results['User'] as $value) {
            $output .= '<td>'. h($value) .'</td>'."\n";
        }
        $output .= '</tr>'."\n";
    }
    return $output;
}

?>