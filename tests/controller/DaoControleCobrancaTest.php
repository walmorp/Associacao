<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleCobranca.php');
class DaoControleCobrancaTest extends TesteCase {

    /**
     * @var DaoControleCobranca
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoControleCobranca;
        $_GET['id']='1';
        $_GET['idTitulo']='1';
        $_GET['idAssociado']='1';
        $_GET['idTipoCobranca']='1';
        $_GET['idSituacaoBaixa']='2';
        $_GET['dataVencimento']='10/10/2018';
        $_GET['valorNominal']='100';
        $_GET['valorAcrescimo']='10';
        $_GET['valorAbatimento']='10';
        $_GET['valorBaixado']='100';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoControleCobranca::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('COBRANCA', $this->object->getTabela());
    }

    /**
     * @covers DaoControleCobranca::getClassModel
     * @todo   Implement testGetClassModel().
     */
    public function testGetClassModel() {
       $this->assertEquals('Cobranca', $this->object->getClassModel());
    }

    /**
     * @covers DaoControleCobranca::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('ControleCobranca', $this->object->getClassView());
    }

    /**
     * @covers DaoControleCobranca::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoControleCobranca::insere
     * @todo   Implement testInsere().
     */
    public function testInsere() {
       $this->assertEquals(true, $this->object->insere());
       $_GET['valorBaixado']='0';
       $this->assertEquals(true, $this->object->insere());
       $_GET['idTipoCobranca']='0';
       $this->assertEquals(false, $this->object->insere());
    }

    /**
     * @covers DaoControleCobranca::existe
     * @todo   Implement testExiste().
     */
    public function testExiste() {
       $this->assertEquals(true, $this->object->existe('5'));
       $this->assertEquals(false, $this->object->existe('0'));
    }

    /**
     * @covers DaoControleCobranca::apaga
     * @todo   Implement testApaga().
     */
    public function testApaga() {
       $this->assertEquals(true, $this->object->apaga('1'));
       $this->assertEquals(false, $this->object->apaga(''));
    }

    /**
     * @covers DaoControleCobranca::gravar
     * @todo   Implement testGravar().
     */
    public function testGravar() {
       $_GET['id']='5';
       $this->assertEquals(true, $this->object->gravar());
       unSet($_GET['id']);
       $this->assertEquals(true, $this->object->gravar());
    }

    /**
     * @covers DaoControleCobranca::altera
     * @todo   Implement testAltera().
     */
    public function testAltera() {
       $this->assertEquals(true, $this->object->altera());
       $_GET['valorBaixado']='0';
       $_GET['idAssociado']='';
       $this->assertEquals(true, $this->object->altera());
       //$_GET['idTitulo']='';
       $_GET['idTipoCobranca']='0';
       $_GET['dataVencimento']='';
       $this->assertEquals(true, $this->object->altera());
    }


    /**
     * @covers DaoControleCobranca::lerAssociadoTitulo
     * @todo   Implement testLerAssociadoTitulo().
     */
    public function testLerAssociadoTitulo() {
       $this->assertEquals("1", $this->object->lerAssociadoTitulo(1));
       $this->assertEquals(false, $this->object->lerAssociadoTitulo(-1));
    }

    /**
     * @covers DaoControleCobranca::ler
     * @todo   Implement testLer().
     */
    public function testLer() {
       $this->assertCount(13, $this->object->ler('1'));
    }

    /**
     * @covers DaoControleCobranca::lista
     * @todo   Implement testLista().
     */
    public function testLista() {
       $this->assertEquals(true, $this->object->lista());
       $this->assertEquals(true, $this->object->lista("A"));
    }

}
