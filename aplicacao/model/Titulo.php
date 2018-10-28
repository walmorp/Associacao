<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Tabela.php');
require_once (__APP_.'model/Associado.php');
class Titulo implements Tabela {
 const TABELA="TITULO";
 private $id;
 private $numero_titulo;
 private $Associado;
 private $data_socio;
 private $id_tipo_titulo;
 private $id_situacao_titulo;
 
 public static function getTabela() {
     return self::TABELA;
 }

 public function getId() {
     return $this->id;
 }

 public function getNumero_titulo() {
     return $this->numero_titulo;
 }

 public function getAssociado() {
     return $this->Associado;
 }

 public function getData_socio() {
     return $this->data_socio;
 }

 public function getId_tipo_titulo() {
     return $this->id_tipo_titulo;
 }

 public function getId_situacao_titulo() {
     return $this->id_situacao_titulo;
 }

 public function setId($id) {
     $this->id = $id;
 }

 public function setNumero_titulo($numero_titulo) {
     $this->numero_titulo = $numero_titulo;
 }

 public function setAssociado($Associado) {
     $this->Associado = $Associado;
 }

 public function setData_socio($data_socio) {
     $this->data_socio = $data_socio;
 }

 public function setId_tipo_titulo($id_tipo_titulo) {
     $this->id_tipo_titulo = $id_tipo_titulo;
 }

 public function setId_situacao_titulo($id_situacao_titulo) {
     $this->id_situacao_titulo = $id_situacao_titulo;
 }
}
?>