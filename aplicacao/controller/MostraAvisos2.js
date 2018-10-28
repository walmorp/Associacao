var n2 = 0;
var xhttp2 = new XMLHttpRequest();
xhttp2.onreadystatechange = function() {
 if (this.readyState === 4 && this.status === 200) {
   n2 += 1;
   c = '';
   if (n2===2) { 
      c = '.'; 
   } else if (n2===3) {
      c = '..'; 
   } else if (n2===4) {
      c = '...'; 
      n2 = 0; 
   }
   postMessage(this.responseText + ' ' + c);
 }
};

function Verifica2() {
   xhttp2.open("GET", "http://localhost/Associacao/aplicacao/Avisos2.php", true);
   xhttp2.send();
   setTimeout(Verifica2, 20200);
   return;
}
Verifica2();
