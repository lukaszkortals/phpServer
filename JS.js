"use strict";

window.onload=function(){
    if (localStorage.getItem("css") === null) {
         zmienCssNa("cssGreen.css");
    }else{
        zmienCssNa(getCss());
    }
    odliczanie(); 
    rysujLogo();
    dajListeTabel();
};

function zmienCssNa( styl){
   var asddas=document.getElementById('cssLink');
   asddas.setAttribute('href',styl);
   localStorage.setItem('css', styl);
}

function getCss(){
    return localStorage.getItem('css');
}

function odliczanie() {
    var dzisiaj = new Date();
    var dzien = dzisiaj.getDate();
    var miesiac = dzisiaj.getMonth()+1;
    var rok = dzisiaj.getFullYear();

    var godzina = dzisiaj.getHours();
    if (godzina<10) godzina = "0"+godzina;

    var minuta = dzisiaj.getMinutes();
    if (minuta<10) minuta = "0"+minuta;

    var sekunda = dzisiaj.getSeconds();
    if (sekunda<10) sekunda = "0"+sekunda;

    document.getElementById("zegar").innerHTML = dzien+"/"+miesiac+"/"+rok+" | "+godzina+":"+minuta+":"+sekunda;
    setTimeout("odliczanie()",1000);
}

function rysujLogo() {
    var canvas = document.getElementById('logo');
    var context = canvas.getContext('2d');
    context.fillStyle = 'gray';
    context.fillRect(0, 0, 130, 50);
			
    context.beginPath();
    context.moveTo(5,5);
    context.lineTo(125,5);
    context.lineTo(125,45);
    context.lineTo(5,45);
    context.lineTo(5,5);
    context.stroke();

    context.beginPath();
    context.moveTo(1,1);
    context.lineTo(129,1);
    context.lineTo(129,49);
    context.lineTo(1,49);
    context.lineTo(1,1);
    context.stroke();

    context.strokeStyle="red";
    context.font = "20px Arial";
    context.strokeText("LX db Editor",10,33);			
}

function dajListeBaz(){
    var xhr=new XMLHttpRequest();
    xhr.open("POST","listaBaz.php",true);
    xhr.onreadystatechange=function() {
        if (this.readyState===4 && this.status===200){
            var myObj = JSON.parse(xhr.responseText);
            var x, i=1;
            var txt = "<option value=''>";
            for (x in myObj) {
               txt +="<option value=" + myObj[x] + ">";
               txt += myObj[x] + "</option>";
               i++;
           }
            document.getElementById("wyborBazy").innerHTML = txt;
        }
    };
    //xhr.open("POST", "listaBaz.php", true);
    console.log("sendRE");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("x=" + dbParam);
    xhr.send();
}

function ustawBaze(baza){
    var xhr=new XMLHttpRequest();
    xhr.open("POST","listaBaz.php",true);
    
    
    localStorage.setItem('baza', baza);
    console.log(baza);
}

function dajListeTabel(){
    var xhr=new XMLHttpRequest();
    xhr.open("POST","listaTabel.php",true);
    xhr.onreadystatechange=function() {
        if (this.readyState===4 && this.status===200){
            var myObj = JSON.parse(xhr.responseText);
            var x, i=1;
            var txt = "<option value=''>";
            for (x in myObj) {
               txt +="<option value=" + myObj[x] + ">";
               txt += myObj[x] + "</option>";
               i++;
           }
            document.getElementById("tabela").innerHTML = txt;
        }
    };
    //xhr.open("POST", "listaBaz.php", true);
    console.log("sendRE");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("x=" + dbParam);
    xhr.send();
}