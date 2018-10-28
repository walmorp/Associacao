<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/ValidaSessao.php');
$id = $this::getCampo("id");
if ($this::campoExiste("gravar")) {
    $Dados = $this::Gravar();
} else if ($this::campoExiste("opera")) {
    if ($this::getCampo("opera") == "A") {
        $Dados = $this::alterarDados($this, $id);
    } else if ($this::getCampo("opera") == "D") {
        $Dados = $this::apagarDados($this, $id);
    } else if ($this::getCampo("opera") == "C") {
        $Dados = $this::consultarDados($this, $id);
    } else {
        $Dados = $this::iniciaDados($this);
    }
} else {
    $Dados = $this::iniciaDados($this);
}
?>