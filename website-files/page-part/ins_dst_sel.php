<?php 
	$a=[
        'Alipurduar', 
        'Bankura', 
        'Birbhum', 
        'Cooch Behar', 
        'Dakshin Dinajpur',
        'Darjeeling', 
        'Hooghly', 
        'Howrah', 
        'Jalpaiguri', 
        'Jhargram', 
        'Kalimpong',
        'Kolkata',
        'Malda', 
        'Murshidabad', 
        'Nadia', 
        'North 24 Parganas', 
        'Paschim Bardhaman',
        'Paschim Medinipur', 
        'Purba Bardhaman',
        'Purba Medinipur', 
        'Purulia', 
        'South 24 Parganas',
        'Uttar Dinajpur'
    ];
                
    for( $i = 0; $i<count($a);$i++ ){
                
        echo "<option value='$a[$i]'>$a[$i]</option>";};
                
?>