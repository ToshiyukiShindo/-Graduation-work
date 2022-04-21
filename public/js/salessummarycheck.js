'use strict'

let ckbyterm = document.getElementById('ckbyterm');
let ckbycate = document.getElementById('ckbycategory');
let ckbystore = document.getElementById('ckbystore');
let ckbystorecate = document.getElementById('ckbystorecategory');
let graphbyterm = document.getElementById('graphbyterm');
let graphbycate = document.getElementById('graphbycategory');
let graphbystore = document.getElementById('graphbystore');
let graphbystorecate = document.getElementById('graphbystorecategory');

ckbyterm.addEventListener('change',()=>{
   graphbyterm.classList.toggle('hidden'); 
});
ckbystore.addEventListener('change',()=>{
   graphbystore.classList.toggle('hidden'); 
});
ckbycate.addEventListener('change',()=>{
   graphbycate.classList.toggle('hidden'); 
});
ckbystorecate.addEventListener('change',()=>{
   graphbystorecate.classList.toggle('hidden'); 
});
