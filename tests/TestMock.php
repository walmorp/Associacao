<?php
  require_once ('defineVar.php');
  require_once ('TesteCase.php');
  require_once (__APP_.'model/Cidade.php');
class TestMock extends TesteCase {
  protected $object;
  protected function setup() {
    
  }
    
  public function testFKCidade() {
     $this->objCidade = $this->createMock(Cidade::class);

     // Configura objCidade. 
     $this->objCidade->method( 'getNome' )->willReturn('Criciúma');

     // Chamar objCidade-> getNome () agora retornará 
     // 'Criciúma'. 
     $this->assertEquals('Criciúma', $this->objCidade->getNome());
  }
}
?>