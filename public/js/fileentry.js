'use strict'

let fileentry = document.getElementById('fileentry');
let filetitle = document.getElementById('filetitle');
let filedesc = document.getElementById('filedesc');
let file = document.getElementById('file');
let filetag = document.getElementById('filetag');
let filesave = document.getElementById('filesave');

fileentry.addEventListener('click',()=>{
    filetitle.classList.toggle('hidden');
    filedesc.classList.toggle('hidden');
    file.classList.toggle('hidden');
    filetag.classList.toggle('hidden');
    filesave.classList.toggle('hidden');
});