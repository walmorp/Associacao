 
 Formulario = null;
 
 OpcaoSelecione = "[Selecione...]";

 function ConfirmaExclusao(pExec) {
  return confirm("Confirma exclusão do registro?\n" + pExec);
 }

 function ConfirmaGavacao(pExec) {
  Mensagem = "Confirma gravação do registro?";
  if(document.cadastro.id.value=="") { alert("O Campo código é obrigatório!"); return false; }
  if(document.cadastro.id.value=="0") { Mensagem = "Confirma inclusão de novo registro?"; }
  return confirm(Mensagem + "\n" + pExec);
 }
  
 function ValidaCampos() {
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function ValidaCamposTitulos() {
  if(document.cadastro.dataSocio.value=="") { alert("O Campo data é obrigatório!"); return false; }
  if(document.cadastro.numeroTitulo.value=="") { alert("O Campo número é obrigatório!"); return false; }
  if(document.cadastro.idAssociado.value==OpcaoSelecione) { alert("O Campo associado é obrigatório!"); return false; }
  if(document.cadastro.idTipoTitulo.value==OpcaoSelecione) { alert("O Campo tipo do título é obrigatório!"); return false; }
  if(document.cadastro.idSituacaoTitulo.value==OpcaoSelecione) { alert("O Campo situação do título é obrigatório!"); return false; }
  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function ValidaCamposAssociado() {
  if(document.cadastro.nome.value=="") { alert("O Campo nome é obrigatório!"); return false; }
  if(document.cadastro.endereco.value=="") { alert("O Campo endereço é obrigatório!"); return false; }
  if(document.cadastro.nascimento.value=="") { alert("O Campo nascimento é obrigatório!"); return false; }
  
  if (!validaIdade(document.cadastro.nascimento.value, 18)) { alert("O associado deve ter 18 anos!"); return false; }
  
  if(document.cadastro.cpf.value=="") { alert("O Campo cpf é obrigatório!"); return false; }
  if(document.cadastro.genero.value==OpcaoSelecione) { alert("O Campo gênero é obrigatório!"); return false; }
  if(document.cadastro.cidade.value==OpcaoSelecione) { alert("O Campo cidade é obrigatório!"); return false; }
  if(document.cadastro.situacao.value==OpcaoSelecione) { alert("O Campo situação do associado é obrigatório!"); return false; }
  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function ValidaCamposCobranca() {
  if(document.cadastro.idTitulo.value==OpcaoSelecione) { alert("O Campo número do título é obrigatório!"); return false; }
//  if(document.cadastro.idAssociado.value==OpcaoSelecione) { alert("O Campo nome do associado é obrigatório!"); return false; }
  if(document.cadastro.idTipoCobranca.value==OpcaoSelecione) { alert("O Campo tipo de cobrança é obrigatório!"); return false; }

  if(document.cadastro.dataVencimento.value=="") { alert("O Campo data vencimento é obrigatório!"); return false; }
  if(document.cadastro.valorNominal.value=="") { alert("O Campo valor nominal é obrigatório!"); return false; }

  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function ValidaCamposParcelas() {
  if(document.cadastro.dataVencimento.value=="") { alert("O Campo data vencimento é obrigatório!"); return false; }
  if(document.cadastro.valorNominal.value=="") { alert("O Campo valor nominal é obrigatório!"); return false; }
  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function ValidaCamposTipoCobranca() {
  if(document.cadastro.descricao.value=="") { alert("O Campo descrição é obrigatório!"); return false; }
  if(document.cadastro.sigla.value=="") { alert("O Campo sigla é obrigatório!"); return false; }
  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }
 
 function ValidaCamposCidade() {
  if(document.cadastro.nome.value=="") { alert("O Campo nome é obrigatório!"); return false; }
  if(document.cadastro.siglaUF.value=="") { alert("O Campo uf é obrigatório!"); return false; }
  if(!ConfirmaGavacao("")) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }
 
 function ValidaCamposCadastraParcelas() {
  if(document.cadastro.idTituloInicio.value=="") { alert('O Campo código inicial é obrigatório!'); return false; }
  if(document.cadastro.idTituloFinal.value=="") { alert('O Campo código inicial é obrigatório!'); return false; }

  if(document.cadastro.idTitulo.value==OpcaoSelecione) { alert("O Campo selecione o título é obrigatório!"); return false; }
  if(document.cadastro.idTipoCobranca.value==OpcaoSelecione) { alert("O Campo tipo de título é obrigatório!"); return false; }

  if(document.cadastro.dataVencimento.value=="") { alert("O Campo data vencimento é obrigatório!"); return false; }
  if(document.cadastro.valorNominal.value=="") { alert("O Campo valor nominal é obrigatório!"); return false; }

  if (!confirm('Confirma criação de novas parcelas, conforme parametros informados?')) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }
 
 function ValidaCamposBaixaParcela() {
  if(document.cadastro.dataBaixa.value=="") { alert("O Campo data baixa é obrigatório!"); return false; }
  if(document.cadastro.valorAcrescimo.value=="") { alert("O Campo valor do acréscimo é obrigatório!"); return false; }
  if(document.cadastro.valorAbatimento.value=="") { alert("O Campo valor do abatimento é obrigatório!"); return false; }
  if(document.cadastro.valorBaixado.value=="") { alert("O Campo valor baixado é obrigatório!"); return false; }
  
  if (!confirm('Confirma baixa da parcela?')) {return false; }
  MostraMensagem("Aguarde, enviando dados...");
  return true;
 }

 function Trim(str) {return str.replace(/^\s+|\s+$/g,"");}
 
 function AbrePagina(Pagina) {
  window.location.assign(Pagina);
//  document.parentNode.getElementById("centro").src = Pagina;
 }
 
 function MostraNoCentro(Pagina) {
  document.getElementById("centro").src = Pagina;
 }
 
 function MostraMensagem(Mensagem) {
  if ((Mensagem===null) || (Mensagem==="")) {
    Mensagem="Por favor, aguarde...";
  }
  PosHeight = ( ( (document.body.clientHeight - 80 ) / 2 ) * -1 );  
  document.getElementById("TextoMensagem").innerHTML = Mensagem;
  document.getElementById("Mensagem").style.top = PosHeight + "px";
  document.getElementById("Mensagem").style.display = "block";
 } 
 
 function OcultaMensagem() {
  document.getElementById("TextoMensagem").innerHTML = "Por favor, aguarde...";
  document.getElementById("Mensagem").style.display = "none";
 } 
  
 function MostraTamanho() {
     document.getElementById("Resulucao").innerHTML = "Resolução atual: <b>"+screen.width+"X"+screen.height +"</b> - "+ 
	                                              "O tamanho da janela está em <b>"+document.body.clientWidth+"X"+document.body.clientHeight+"</b>";
     setTamanhoCentro();
 }
 
 function setTamanhoCentro() {
     
     tamanhoBorda = 120;
     idJanela1 = "idJanela";
     idJanela2 = "idJanelaNavegacao";
     idJanela3 = "iframeCentro";
     
     //if (document.getElementById(idJanela1) != null) {
        document.getElementById(idJanela1).style.height = (document.body.clientHeight);
       // document.getElementById(idJanela2).style.height = (document.body.clientHeight - tamanhoBorda);
        document.getElementById(idJanela3).style.height = (document.body.clientHeight - tamanhoBorda);
     //}
     //if (document.getElementById(idJanela) != null) {
     //   document.getElementById(idJanela).style.width = (document.body.clientWidth - tamanhoBorda);
     //}
     //alert("Tamanho alterado: "+ document.body.clientWidth+"X"+document.body.clientHeight + " tamanhoBorda: " + tamanhoBorda );
 }

function imprimirDiv(nomeDiv, botao){
   
   vDisplay = botao.style.display;
   vVisibility = botao.style.visibility;
   botao.style.display = 'none';
   botao.style.visibility = 'hidden';

   var conteudo = document.getElementById(nomeDiv).innerHTML;
   tela_impressao = window.open('about:Impressão');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
   
   botao.style.display = vDisplay;
   botao.style.visibility = vVisibility;
}
 function LimparForm(Formulario) {
  elemento = document.getElementById("labelID");
  if (elemento!=null) { 
     document.getElementById("labelID").innerHTML = "&nbsp;"; 
  }

  var elements = Formulario.elements;

  for(i=0; i<elements.length; i++) {

   tipoCampo = elements[i].type.toLowerCase();
  
   switch(tipoCampo) {

    case "text":
    case "password":
    case "textarea":
    case "hidden":
      elements[i].value = "";
      ResetaClasse(elements[i]);
      break;

    case "radio":
    case "checkbox":
      if (elements[i].checked) {
         elements[i].checked = false;
         ResetaClasse(elements[i]);
      }
      break;

    case "select-one":
    case "select-multi":
      elements[i].selectedIndex = 0;
      ResetaClasse(elements[i]);
      break;

    default:
      break;
   }
  }    
} 

 function ResetCadastro(Formulario) {
    LimparForm(Formulario);
    Formulario.reset();
    elemento = document.getElementById("labelID");
    if (elemento!=null) { 
       document.getElementById("labelID").innerHTML = document.getElementById("id").value; 
    }
    
 }

 function NovoCadastro(Formulario, botaoGravar) {
    LimparForm(Formulario);
    setDisabed(botaoGravar, false);
    document.getElementById("labelID").innerHTML = "0";
    document.getElementById("id").value = "0";
 }
 
 function setDisabed(botao, pDisabled) {
    document.getElementById(botao).disabled = pDisabled;
 }
 
 function CampoErrado(ee) {
  ee.className = "campoErro";
 } 
 
 function ResetaClasse(ec) {
  ec.className = "campo";
 } 
 
 function FormataCEP(cep) {
  t = Trim(cep.value);
  t = t.replace(".", "");
  t = t.replace("-", "");
  t = t.replace(" ", "");
  if ( t.length == 8 ) {
     cep.value = t.substring(0, 2)+"."+t.substring(2, 5)+"-"+t.substring(5);
     ResetaClasse(cep);
     return true;
  }
  CampoErrado(cep);
  return false;
 }
 
 function validaIdade(data, maxAnosIdade) {
     if (data === "") {
         return false;
     }
     if (maxAnosIdade === "") {
         return false;
     }
     dataComp = null;
     try {
        dataParte = data.split("/");
        dataComp = new Date(dataParte[2], parseInt(dataParte[1]) - 1, dataParte[0]);
        max = parseInt(maxAnosIdade);
        if (max === 'NaN') {
            return false;
        }
     } catch (e) {
        return false;
     } 

     dataAtual = new Date();
     dataLimite = new Date(dataAtual.getFullYear() - max,
                           dataAtual.getMonth(),
                           dataAtual.getDate());
     if (dataComp.getTime() > dataLimite.getTime()) {
         return false;
     } else {
         return true;
     }
 }
 function ValidaCampo(vc) {
  if (vc.tagName == "SELECT") {
     if ( vc.selectedIndex == 0 ) {
        CampoErrado(vc);
        return false;
     } else {
        ResetaClasse(vc);
        return true;
     }
  }
  t = Trim(vc.value);
  if ( t.length == 0 ) {
     CampoErrado(vc);
     return false;
  }
  ResetaClasse(vc);
  return true;
 }
 
 function ValidaData(d) {
   try {
      data = new Date(d.substring(6), d.substring(3, 5), d.substring(0, 2));
      return true;
   } catch (e) {
      return false; 
   }   
 }
 
 function FormataData(data) {
  t = Trim(data.value);
  t = t.replace("/", "");
  t = t.replace("/", "");
  t = t.replace("-", "");
  t = t.replace("-", "");
  t = t.replace(" ", "");
  t = t.replace(" ", "");
  if ( t.length == 8 ) {
     data.value = t.substring(0, 2)+"/"+t.substring(2, 4)+"/"+t.substring(4);
     if (ValidaData(data.value)) {
        ResetaClasse(data);
        return true;
     }
  } else if ( t.length == 6 ) {
     data.value = t.substring(0, 2)+"/"+t.substring(2, 4)+"/20"+t.substring(4);
     if (ValidaData(data.value)) {
        ResetaClasse(data);
	return true;
     }
  }
  CampoErrado(data);
  return false;
 }
 
 function FormataCPF(cpf) {
  t = Trim(cpf.value);
  t = t.replace(".", "");
  t = t.replace(".", "");
  t = t.replace(".", "");
  t = t.replace("-", "");
  t = t.replace("/", "");
  t = t.replace(" ", "");
  if ( t.length == 11 ) {
     cpf.value = t.substring(0, 3)+"."+t.substring(3, 6)+"."+t.substring(6, 9)+"-"+t.substring(9);
     ResetaClasse(cpf);
     return true;
  }
  CampoErrado(cpf);
  return false;
 }
 
 function FormataDecimal(num) {
  try {
     num.value = parseFloat(num.value).toFixed(2);
     if (num.value == 'NaN') {
         num.value = parseFloat(0).toFixed(2);
     }
  } catch (e) {
     CampoErrado(num);
     return false;
  } 
  if (ValidaCampo(num)) {
     ResetaClasse(num);
     return true;
  }
  CampoErrado(num);
  return false;
 }

function AdicionaItemNaLista(Lista, Item) {
  var li = document.createElement("li");
  var nodeItem = document.createTextNode(Item);
  li.appendChild(nodeItem);
  Lista.appendChild(li);

  li.appendChild(t);
}