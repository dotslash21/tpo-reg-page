 
<html>
<head><title>TPO REGISTRATION PAGE</title>
    <style>
        button{
            margin: 10% 50%;
            height: 50px;
            width: 150px;
        }
        
        form{
            height: auto;
            width: 1300px;
            padding-left: 5px;
            border: 5px outset gray;
            box-shadow: 10px 10px 5px #c1c1c1;
        }
        td{
            font-weight: bold;
            padding-top: 20px;
        }
        .box{
            width: 500px;
            height: 30px;
            background-color: rgb(227, 253, 255);
            border-radius: 3px;
            font-weight: bold;
            font-size: 15px;
        }
        
        .box:focus{
            box-shadow: 0px 0px 15px #006cff;
        }
        .chk{
            padding-left: 30%;
            padding-bottom: 20px;
        }
        h1{
            font-weight: bold;
            color: white;
            width: 100%;
            background-color: darkblue;
            text-align: center;
            font-family: cambria;
        }
        #addr:focus{
            box-shadow: 0px 0px 15px #006cff;
        }
        
        #insn:focus{
            width: 900px;
            height: 30px;
            background-color: rgb(227, 253, 255);
            border-radius: 3px;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
    
<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">



    
    
 $('#dsts').bind('change', function(event) {

           var i= $('#dsts').val();

            if(i=="Westbengal")
             {
                 $('#wsd').show();
                 $('#dst').hide();
             }
           else
             {
               $('#wsd').hide();
               $('#dst').show();
              }
});
});

</script>
    
    </head>


<body>
    <h1>WELCOME TO WESTBENGAL ONLINE TPO REGISTRATION PORTAL </h1>
    <div id="whl">
    <form action="" method="post">
        <table>
        
         <tr>
            <td>1. Institute Name :</td>
            <td><input id="insn" class="box" type="text" required name="ins_id" > </td>
        </tr>
            
        <tr>
            <td>2. Institute User ID :</td>
            <td><input class="box" type="text" required name="ins_id" placeholder="Given by email" > </td>
        </tr>
            
        <tr>
            <td>3. Institute Password :</td>
            <td><input class="box" type="text" required name="ins_psw" placeholder="Please Remmember this Password"> </td>
        </tr>
            
        <tr>
            <td>4. Institute Establishment Year :</td>
            <td><input class="box" type="text" required name="ins_estd"  placeholder="Only Numeric 4-Digit Year ; like:1950"> </td>
        </tr>
        
        <tr>
            <td>5. Institute Accriditated By :</td>
            <td><select name="ins_accrd">
                <?php 
                $a=['NAAC-A+','NAAC-A','NAAC-B','NAAC-C','NAAC-D','X','Y','Z'];
                for( $i = 0; $i<count($a);$i++ ){
                    echo "<option value='$a[$i]'>$a[$i]</option>";};?>
	           </select>
            </td>
        </tr>
            
        <tr>
            <td>6. Institute Type :</td>
            <td><select name="ins_typ">
		        <option value="government">Government</option>
                <option value="government_aided">Government Aided</option>
                <option value="self_finnaced">Self Finnanced</option>
	           </select>
            </td>
        </tr>
            
        <tr>
            <td>7. Institute Affiliated By :</td>
            <td><select name="ins_aff">
                <?php 
                $a=['Name-1','Name-2','Name-3','Name-4','Name-5','Name-6','Name-7','Name-8'];
                for( $i = 0; $i<count($a);$i++ ){
                    echo "<option value='$a[$i]'>$a[$i]</option>";};?>
	           </select>
            </td>
        </tr>
           
        <tr>
            <td>8. Institute Approved By :</td>
          <td><select name="ins_ap">
                <?php 
                $a=['Name-1','Name-2','Name-3','Name-4','Name-5','Name-6','Name-7','Name-8'];
                for( $i = 0; $i<count($a);$i++ ){
                    echo "<option value='$a[$i]'>$a[$i]</option>";};?>
	           </select>
            </td>
        </tr>
            
        <tr>
            <td>9. Institute Address :</td>
            <td><textarea id="addr" required name="ins_add" cols="60" rows="7" style="background-color:rgb(227, 253, 255);border-radius: 3px;" ></textarea> </td>
        </tr>
        
        <tr>
            <td>10. Institute PIN :</td>
            <td><input class="box" type="number" required name="ins_pin"  maxlength="6" placeholder="6-Digit PIN Code" > </td>
        </tr>
            
            
        <tr>
            <td>11. Institute State :</td>
           <td><select name="ins_st" id="dsts">
                <?php 
                $a=['Delhi','Westbengal','Name-3','Name-4','Name-5','Name-6','Name-7','Name-8'];
                for( $i = 0; $i<count($a);$i++ ){
                    echo "<option value='$a[$i]'>$a[$i]</option>";};?>
	           </select>
            </td>
        </tr>    
        <tr>
            <td>12. Institute District :</td>
            <td id="dst"  ><input  class="box" type="text" required name="ins_dst" > </td>
             <td id="wsd" style="display:none"><select name="ins_dst">
                <?php 
                $a=['WS-1','WS-2','WS-3','WS-4','WS-5','WS-6','WS-7','WS-8'];
                for( $i = 0; $i<count($a);$i++ ){
                    echo "<option value='$a[$i]'>$a[$i]</option>";};?>
	           </select>
            </td>
        </tr>
        
            
        <tr>
            <td>13. Institute Postoffice :</td>
            <td><input class="box" type="text" required name="ins_po" > </td>
        </tr>
            
            
        <tr>
            <td>14. Institute Contact Number :</td>
            <td><input class="box" type="text" required name="ins_cnn" placeholder="Please Input Single Number " > </td>
        </tr>
            
        <tr>
            <td>15. Institute Email id :</td>
            <td><input class="box" type="text" required name="ins_cne" placeholder="Please Input Single Number "> </td>
        </tr>
            
        <tr>
            <td>16. Institute Website :</td>
            <td><input class="box" type="text" required name="ins_web" placeholder="Please Input Single Website"> </td>
        </tr>
            
        <tr>
            <td>17. Institute Head Name :</td>
            <td><input class="box" type="text" required name="ins_hdnm" > </td>
        </tr>
        
        <tr>
            <td>18. Institute Head Designation :</td>
            <td><input class="box" type="text" required name="ins_hd_dsg" > </td>
        </tr>
            
        <tr>
            <td>18. Institute Head Contact Number(Mobile) :</td>
            <td><input class="box" type="text" required name="ins_hdcn" placeholder="Please Input Single Number "> </td>
        </tr>
            
        <tr>
        <td>19. Institute Head Contact Number(Land Line) :</td>
            <td><input class="box" type="text"  name="ins_hdcn" placeholder="Optional"> </td>
        </tr>
        
        <tr>
            <td>20. Institute Head Contact Email Id :</td>
            <td><input class="box" type="text" required name="ins_hdem" placeholder="Please Input Single Email id"> </td>
        </tr>
        
            
        <tr>
            <td>21. Institute TPO Name :</td>
            <td><input class="box" type="text" required name="ins_tponm" placeholder="Only One Name"> </td>
        </tr>
            
        <tr>
            <td>22. Institute TPO Contact Number-1 :</td>
            <td><input class="box" type="text" required name="ins_tpon1" placeholder="Please Input Single Number "> </td>
        </tr>
            
        <tr>
            <td>23. Institute TPO Contact Number-2 :</td>
            <td><input class="box" type="text"  name="ins_tpon2" placeholder="Optional"> </td>
        </tr>
            
        <tr>
            <td>24. Institute TPO Email Id :</td>
            <td><input class="box" type="text" required name="ins_tpoem" placeholder="Please Input Single Email id "> </td>
        </tr>
            
        <tr>
            <td>25. Institute Total Number of Computers :</td>
            <td><input class="box" type="number" min="0" required name="ins_comp"> </td>
        </tr>
        
         <tr>
            <td>26. Institute Total Number of Computer Lab :</td>
            <td><input class="box" type="number" min="0" required name="ins_compl"> </td>
        </tr>
            
         <tr>
            <td>27. Minimum Number of Computers in a Lab :</td>
            <td><input class="box" type="number" min="0" required name="ins_mlcomp"> </td>
        </tr>
            
        <tr>
            <td>28. Institute Internet Speed (calculated only in Kbps) :</td>
            <td><input class="box" type="number" min="0" placeholder="in Kbps" required name="ins_insp"> </td>
        </tr>
            
        <tr>
            <td>29. Institute Total Hall Capacity :</td>
            <td><input class="box" type="number" min="0" required name="ins_hc"> </td>
        </tr>
            
        <tr>
            <td>30. Institute Has Optical Fiber LAN:</td>
            <td><input type="radio" name="ins_flan" checked="chek" value="yes" />YES
          <input type="radio" name="ins_flan" value="NO" />NO</td>
        </tr>
            
        <tr>
            <td>31. Institute Total CCTV Camera in LAB:</td>
            <td><input class="box" type="number" min="0" required name="ins_cctv"> </td>
        </tr>
            
        <tr>
            <td>32. Institute Available Courses:</td>
        </tr>
            
            
        <tr>
            <td>33. Institute Available Streams:</td>
        </tr>
            
        <tr><td class="chk">
            <?php
                 $a =['Stream-1','Stream-2','Stream-3','Stream-4','Stream-5'];for( $i = 0; $i<5; $i++ ) {echo "<input type='checkbox' name='stream[]' value='$a[$i]' > $a[$i] </br>";}
            ?> 
            </td>
        </tr>
            
          <tr> 
              <td>
            <button type="submit">SUBMIT</button>
                  </td>
           </tr>
        </table>
    
    
    </form>
        
    </div>
    </body>


</html>