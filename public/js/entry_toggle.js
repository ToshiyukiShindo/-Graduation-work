'use strict'

let guentry = document.getElementById('guentry');
let stentry = document.getElementById('stentry');
let gutitle = document.getElementById('gutitle');
let guname = document.getElementById('guname');
let guemail = document.getElementById('guemail');
let gupermission = document.getElementById('gupermission');
let guorg = document.getElementById('guorg');
let gupassword = document.getElementById('gupassword');
let gubtn = document.getElementById('gubtn');
let gucsv = document.getElementById('gucsv');
let sttitle = document.getElementById('sttitle');
let stgcode = document.getElementById('stgcode');
let stname = document.getElementById('stname');
let stbtn = document.getElementById('stbtn');

guentry.addEventListener('click',()=>{
   gutitle.classList.toggle('hidden'); 
   guname.classList.toggle('hidden'); 
   guemail.classList.toggle('hidden'); 
   gupermission.classList.toggle('hidden'); 
   guorg.classList.toggle('hidden'); 
   gupassword.classList.toggle('hidden'); 
   gubtn.classList.toggle('hidden'); 
   gucsv.classList.toggle('hidden'); 
});

stentry.addEventListener('click',()=>{
   sttitle.classList.toggle('hidden'); 
   stgcode.classList.toggle('hidden'); 
   stname.classList.toggle('hidden'); 
   stbtn.classList.toggle('hidden'); 
});