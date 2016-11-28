<!DOCTYPE html>
<?php
mysql_connect("localhost","root",""); 
mysql_select_db("data"); 

$query = mysql_query("select id_prop,prop from prop"); 
?>

<html>
<head>
<script> 
var drz, kata, x; 
function cekid(){ 
    kata = document.getElementById("userid").value; 
    if(kata.length>2){ 
        document.getElementById("teks").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekid.php"; 
        url=url+"?i="+kata; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus(); 
         } 
} 

function ceknama(){ 
    umur = document.getElementById("nama_lengkap").value; 
    if(umur.length>0){ 
        document.getElementById("teks5").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="ceknama.php"; 
        url=url+"?l="+nama_lengkap; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged3; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus2(); 
         } 
} 

function cekmail(){ 
    email = document.getElementById("email").value; 
    if(email.length>2){ 
        document.getElementById("teks2").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekmail.php"; 
        url=url+"?e="+email; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged2; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus3(); 
         } 
} 

function cekumur(){ 
    umur = document.getElementById("umur").value; 
    if(umur.length>0){ 
        document.getElementById("teks3").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekumur.php"; 
        url=url+"?u="+umur; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged3; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus4(); 
         } 
} 

function cek_kab(){ 
    kec = document.getElementById("prop").value; 
    if(kec.length>0){ 
        document.getElementById("teks4").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cek_kab.php"; 
        url=url+"?k="+kec; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged4; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus5(); 
         } 
} 

function buatajax(){ 
    if (window.XMLHttpRequest){ 
        return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
 
function stateChanged4(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks4").innerHTML = data; 
    } 
} 
 
function stateChanged(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks").innerHTML = data; 
    } 
} 

function stateChanged2(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks2").innerHTML = data; 
    } 
} 
function stateChanged3(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks3").innerHTML = data; 
    } 
} 
function stateChanged5(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks5").innerHTML = data; 
    } 
}

function fokus(){ 
    document.getElementById("userid").focus(); 
} 

function fokus3(){ 
    document.getElementById("email").focus(); 
}
function fokus2(){ 
    document.getElementById("nama_lengkap").focus(); 
}

function fokus4(){ 
    document.getElementById("umur").focus(); 
}  

function fokus5(){ 
    document.getElementById("prop").focus(); 
}  

</script> 
</head>
<body>
<form> 
<h3><center>INPUT DATA</blink></h3></center><br>
<hr/><br>
User ID :<pre><input type=text name=userid id=userid onblur=cekid()> 
<span id=teks style="color:red;font-size:8pt"></span> <br><br>
Nama Lengkap  : <pre><input type=text name=nama_lengkap id=nama_lengkap onblur=ceknama() >
<span id=teks5 style="color:red;font-size:8pt"></span> <br><br>
Email :<pre><input type=text name=email id=email onblur=cekmail() >
<span id=teks2 style="color:red;font-size:8pt"></span> <br><br>
Umur :<pre> <input type=text name=umur id=umur onblur=cekumur() >
<span id=teks3 style="color:red;font-size:8pt"></span> <br><br>
Provinsi :<pre>
<?php 
    if(mysql_num_rows($query)>0){
    echo "<select name='prop' id='prop' onchange=cek_kab()>";
    echo "<option value='0'>Pilih<br>";
    while($row=mysql_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
?>
<span id=teks4 style="color:red;font-size:8pt"></span><br><br>
<hr/>
</form> 
</body>
</html>