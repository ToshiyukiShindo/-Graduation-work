'use strict'

let stentry = document.getElementById('stentry');
let sttitle = document.getElementById('sttitle');
let stgcode = document.getElementById('stgcode');
let stname = document.getElementById('stname');
let stbtn = document.getElementById('stbtn');

stentry.addEventListener('click',()=>{
   sttitle.classList.toggle('hidden'); 
   stgcode.classList.toggle('hidden'); 
   stname.classList.toggle('hidden'); 
   stbtn.classList.toggle('hidden'); 
});