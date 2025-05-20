window.onscroll = () =>{

  navbar.classList.remove('active');

  if(window.scrollY > 100){
      document.querySelector('header').classList.add('active');
  }else{
      document.querySelector('header').classList.remove('active');
  }

}

//slider
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
showSlides(slideIndex += n);
}


function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
  dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}

// document.querySelectorAll('.small-image-1').forEach(images =>{
//   images.onclick = () =>{
//       document.querySelector('.big-image-1').src = images.getAttribute('src');
//   }
// });

// document.querySelectorAll('.small-image-2').forEach(images =>{
//   images.onclick = () =>{
//       document.querySelector('.big-image-2').src = images.getAttribute('src');
//   }
// });

// document.querySelectorAll('.small-image-3').forEach(images =>{
//   images.onclick = () =>{
//       document.querySelector('.big-image-3').src = images.getAttribute('src');
//   }
// });

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
loginForm.classList.toggle('active')
}

document.querySelector('#close-login-btn').onclick = () =>{
loginForm.classList.remove('active')
}


/*function validoSignIn(){
var emaili = document.getElementById("emailid").value;
var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/

if(emaili.trim()==""){
  //alert("Ploteso fushen per email: ");
  document.getElementById('email-error').innerHTML = "Email duhet te plotesohet!";
  return false;
}

if(!(regex.test(emaili))){
  //alert("Emaili pranohet");
  document.getElementById('email-error').innerHTML = "Email nuk eshte ne formatin e duhur!";
  return false;
}

var passwordi = document.getElementById("passwordid").value;
var regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/

if(passwordi.trim()==""){
  //alert("Ploteso fushen per password: ");
  document.getElementById('password-error').innerHTML = "Password duhet te plotesohet!";
  return false;
}

if(!(regex.test(passwordi))){
  //alert("Passwordi pranohet");
  document.getElementById('password-error').innerHTML = "Password nuk eshte valid!";
  return false;
}

document.getElementById('email-error').innerHTML = "";
document.getElementById('password-error').innerHTML = "";

return true;
}*/


function validoContact(){

var emri=document.getElementById("name").value;
var regex=/^[a-zA-Z]{3,}$/

if(emri.trim()==""){
    alert("Shkruaj emrin: ");
}
else if((regex.test(emri))){
    alert("Emri pranohet");
}
else{
    alert("Emri nuk pranohet");
}

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

var numri=document.getElementById("number").value;
var regex=/^0+4+[3-5 | 8-9]+[0-9]{6}$/

if(numri.trim()==""){
    alert("Shkruaj numrin e telefonit:");
}
else if((regex.test(numri))){
    alert("Numri pranohet");
}
else{
    alert("Numri gabim");
}

var tekst=document.getElementById("text").value;
var regex=/^[a-zA-Z0-9]{3,}$/

if(tekst.trim()==""){
    alert("Shkruani kerkesen: ");
}
else if((regex.test(tekst))){
    alert("Kerkesa pranohet");
}
else{
    alert("Kerkesa nuk pranohet");
}

}

function redirectToShoppingCart(){
window.location.href='shoppingcart.php';
}

