var n1 = 0;
var xhttp1 = new XMLHttpRequest();
xhttp1.onreadystatechange = function() {
 if (this.readyState === 4 && this.status === 200) {
   n1 += 1;
   c = '';
   if (n1===2) { 
      c = '.'; 
   } else if (n1===3) {
      c = '..'; 
   } else if (n1===4) {
      c = '...'; 
      n1 = 0; 
   }
   postMessage(this.responseText + ' ' + c);
 }
};

function Verifica1() {
   xhttp1.open("GET", "http://localhost/Associacao/aplicacao/Avisos1.php", true);
   xhttp1.send();
   setTimeout(Verifica1, 10100);
   return;
}
Verifica1();
