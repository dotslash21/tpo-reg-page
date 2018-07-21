        function clicked() {
            if(fromCheck()){
                formSave();
                location.href='http://www.google.com';
            }
        }

        function fromCheck() {
            for (let i = 0; i < 37;i++){
                if(i!=17){
                    if(document.forms['frm'][i].value == ""){
                        alert("Please check all empty fields" + document.forms['frm'][i].name );
                        return false;
                        break;
                    }
                }
            }
            return true;
        }

        function formSave(){
            if(typeof(Storage) !== 'undefined'){
                var has_fiber;
                if(document.getElementById('has_fiber1').checked){
                    has_fiber = document.getElementById('has_fiber1').value;
                }
                if(document.getElementById('has_fiber2').checked){
                    has_fiber = document.getElementById('has_fiber2').value;
                }

            sessionStorage.name = document.getElementById("name").value;    //name
            sessionStorage.inst_code = document.getElementById("inst_code").value;
            sessionStorage.uid = document.getElementById("uid").value;
            sessionStorage.password = document.getElementById("password").value;
            sessionStorage.estd = document.getElementById("estd").value; 
            sessionStorage.accrd = document.getElementById("accrd").value; 
            sessionStorage.inst_type = document.getElementById("inst_type").value; 
            sessionStorage.affli = document.getElementById("affli").value; 
            sessionStorage.inst_appr = document.getElementById("inst_appr").value; 
            sessionStorage.address = document.getElementById("address").value; 
            sessionStorage.pin = document.getElementById("pin").value; 
            sessionStorage.inst_state = document.getElementById("inst_state").value; 
            sessionStorage.ins_dst_sel = document.getElementById("ins_dst_sel").value; 
            sessionStorage.number = document.getElementById("number").value; 
            sessionStorage.email = document.getElementById("email").value; 
            sessionStorage.website = document.getElementById("website").value; 
            sessionStorage.head_name = document.getElementById("head_name").value; 
            sessionStorage.head_desg = document.getElementById("head_desg").value; 
            sessionStorage.head_mob = document.getElementById("head_mob").value; 
            sessionStorage.head_ph = document.getElementById("head_ph").value; 
            sessionStorage.head_email = document.getElementById("head_email").value; 
            sessionStorage.tpo_name = document.getElementById("tpo_name").value; 
            sessionStorage.tpo_contact1 = document.getElementById("tpo_contact1").value; 
            sessionStorage.tpo_contact2 = document.getElementById("tpo_contact2").value; 
            sessionStorage.tpo_email = document.getElementById("tpo_email").value; 
            sessionStorage.num_cmp = document.getElementById("num_cmp").value;
            sessionStorage.num_cmplab = document.getElementById("num_cmplab").value;
            sessionStorage.min_num_cmp = document.getElementById("min_num_cmp").value;
            sessionStorage.ispeed = document.getElementById("ispeed").value;
            sessionStorage.hall_cap = document.getElementById("hall_cap").value;
            sessionStorage.num_cctv = document.getElementById("num_cctv").value;
            sessionStorage.has_fiber = has_fiber;
            }
            else{
                alert("Oops! Your browser don't support Web Storage");
            }
        }