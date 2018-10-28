<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoRelacionaParcelasAssociado.php');
class DaoRelacionaParcelasAssociadoTest extends TesteCase {

    /**
     * @var DaoRelacionaParcelasAssociado
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoRelacionaParcelasAssociado;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoRelacionaParcelasAssociado::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('RelacionaParcelasAssociado', $this->object->getClassView());
    }

    /**
     * @covers DaoRelacionaParcelasAssociado::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoRelacionaParcelasAssociado::mostraRelatorio
     * @todo   Implement testMostraRelatorio().
     */
    public function testMostraRelatorio() {
       unSet($_SESSION['id']);
       unSet($_SESSION['cpf']);
       $_GET['idTipoCobranca']='1';
       $_GET['idSituacaoBaixa']='1';
       $this->assertEquals(true, $this->object->mostraRelatorio());
       $_GET['OperaRParc']='';
       $this->assertEquals(true, $this->object->mostraRelatorio());
       $_SESSION['id']="1";
       $_SESSION['cpf']="xxx";
       $this->assertEquals(true, $this->object->mostraRelatorio());
       
    }

}
