function validate(){
    //per name:
    var emri = document.getElementById("username").value;
    var regex = /^[a-zA-Z]{3,}$/
  
    if(emri.trim()==""){
      alert("Shkruani emrin:");
    }
    else if(regex.test(emri)){
      alert("Emri pranohet");
    }
    else{
      alert("Emri nuk pranohet");
    }

    //per surname:
    var mbiemri = document.getElementById("surname").value;
    var regex = /^[a-zA-Z]{3,}$/
  
    if(mbiemri.trim()==""){
      alert("Shkruani mbiemrin:");
    }
    else if(regex.test(mbiemri)){
      alert("Mbiemri pranohet");
    }
    else{
      alert("Mbiemri nuk pranohet");
    }
  
    //per email address:
    var email = document.getElementById("email").value;
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
  
    if(email.trim()==""){
      alert("Ploteso fushen per email: ");
    }
    else if((regex.test(email))){
      alert("Email-i pranohet");
    }
    else{
      alert("Email-i nuk pranohet");
    }
  
    //per phone number:
    var numri = document.getElementById("phone").value;
    var regex = /^0+4+[3-5 | 8-9]+[0-9]{6}$/
  
    if(numri.trim()==""){
      alert("Shkruani numrin e telefonit: ");
    }
    else if((regex.test(numri))){
      alert("Numri i telefonit pranohet");
    }
    else{
      alert("Numri i telefonit nuk pranohet");
    }
  
    //per birth date:
    var ditelindja = document.getElementById("birthday").value;

    if(ditelindja.trim()==""){
      alert("Shkruani vitin e lindjes: ");
    }
    else{
      alert("Viti i lindjes pranohet");
    }
  
    //per country:
    // var adresa = document.getElementById("address").value;

    // if(adresa == "Country"){
    //     alert("Ploteso fushen per adrese: ");
    // }
    // else{
    //     alert("Adresa pranohet"); 
    // }
  
    //per password:
    var passwordi = document.getElementById("password").value;
    var regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/

    if(passwordi.trim()==""){
        alert("Ploteso fushen per password: ");
    }
    else if((regex.test(passwordi))){
        alert("Passwordi pranohet");
    }
    else{
        alert("Passwordi nuk pranohet");
    }
    
  
  
  
  }