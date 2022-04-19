'use strict'

let salesentry = document.getElementById('salesentry');
let salestitle = document.getElementById('salestitle');
let salesterm = document.getElementById('salesterm');
let salesstoc = document.getElementById('salesstoc');
let salesstname = document.getElementById('salesstname');
let salesss = document.getElementById('salesss');
let salesloy = document.getElementById('salesloy');
let salesgs = document.getElementById('salesgs');
let salesos = document.getElementById('salesos');
let salesbtn = document.getElementById('salesbtn');

salesentry.addEventListener('click',()=>{
   salestitle.classList.toggle('hidden'); 
   salesterm.classList.toggle('hidden'); 
   salesstoc.classList.toggle('hidden'); 
   salesstname.classList.toggle('hidden'); 
   salesss.classList.toggle('hidden'); 
   salesloy.classList.toggle('hidden'); 
   salesgs.classList.toggle('hidden'); 
   salesos.classList.toggle('hidden'); 
   salesbtn.classList.toggle('hidden'); 
});