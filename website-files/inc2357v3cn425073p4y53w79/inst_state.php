<?php 
    $a=[
        'Andaman and Nicobar Islands(AN)',
        'Andhra Pradesh (AP)', 
        'Arunachal Pradesh (AR)', 
        'Assam (AS)', 
        'Bihar (BR)', 
        'Chandigarh (CH)', 
        'Chhattisgarh (CG)', 
        'Dadra and Nagar Haveli (DN)', 
        'Daman and Diu (DD)', 
        'Goa (GA)', 
        'Gujarat (GJ)', 
        'Haryana (HR)', 
        'Himachal Pradesh (HP)', 
        'Jammu and Kashmir (JK)', 
        'Jharkhand (JH)', 
        'Karnataka (KA)', 
        'Kerala (KL)', 
        'Lakshadweep (LD)', 
        'Madhya Pradesh (MP)', 
        'Maharashtra (MH)', 
        'Manipur (MN)', 
        'Meghalaya (ML)', 
        'Mizoram (MZ)', 
        'Nagaland (NL)', 
        'National Capital Territory of Delhi (DL)', 
        'Odisha(OR)', 
        'Pondicherry (PY)', 
        'Punjab (PB)', 
        'Rajasthan (RJ)', 
        'Sikkim (SK)', 
        'Tamil Nadu (TN)', 
        'Telangana (TS)', 
        'Tripura (TR)', 
        'Uttar Pradesh (UP)', 
        'Uttarakhand (UK)', 
        'West Bengal (WB)'
    ];
    for( $i = 0; $i<count($a);$i++ ){
        echo "<option value='$a[$i]'>$a[$i]</option>";
    };
    ?>