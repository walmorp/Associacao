<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleTitulo.php');
class DaoControleTituloTest extends TesteCase {

    /**
     * @var DaoControleTitulo
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoControleTitulo;
        $_GET['id']='1';
        $_GET['numeroTitulo']='1';
        $_GET['idAssociado']='1';
        $_GET['dataSocio']='10/01/2010';
        $_GET['idTipoTitulo']='1';
        $_GET['idSituacaoTitulo']='1';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoControleTitulo::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('TITULO', $this->object->getTabela());
    }

    /**
     * @covers DaoControleTitulo::getClassModel
     * @todo   Implement testGetClassModel().
     */
    public function testGetClassModel() {
       $this->assertEquals('Titulo', $this->object->getClassModel());
    }

    /**
     * @covers DaoControleTitulo::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('ControleTitulo', $this->object->getClassView());
    }

    /**
     * @covers DaoControleTitulo::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoControleTitulo::gravar
     * @todo   Implement testGravar().
     */
    public function testGravar() {
       $this->assertEquals(true, $this->object->gravar());
       $_GET['id']='0';
       $this->assertEquals(true, $this->object->gravar());
    }

    /**
     * @covers DaoControleTitulo::existe
     * @todo   Implement testExiste().
     */
    public function testExiste() {
       $this->assertEquals(true, $this->object->existe('1'));
       $this->assertEquals(false, $this->object->existe('0'));
    }

    /**
     * @covers DaoControleTitulo::apaga
     * @todo   Implement testApaga().
     */
    public function testApaga() {
       $this->assertEquals(true, $this->object->apaga('0'));
       $this->assertEquals(false, $this->object->apaga(''));
    }

    /**
     * @covers DaoControleTitulo::insere
     * @todo   Implement testInsere().
     */
    public function testInsere() {
       $this->assertEquals(true, $this->object->insere());
       $_GET['dataSocio']='2018';
       $this->assertEquals(false, $this->object->insere());
    }

    /**
     * @covers DaoControleTitulo::altera
     * @todo   Implement testAltera().
     */
    public function testAltera() {
       $this->assertEquals(true, $this->object->altera());
       $_GET['id']='0';
       $this->assertEquals(false, $this->object->altera());
    }

    /**
     * @covers DaoControleTitulo::ler
     * @todo   Implement testLer().
     */
    public function testLer() {
       $this->assertContains(true, $this->object->ler('1'));
       $this->assertContains(false, $this->object->ler('0'));
    }

    /**
     * @covers DaoControleTitulo::lista
     * @todo   Implement testLista().
     */
    public function testLista() {
       $this->assertEquals(true, $this->object->lista());
       $_GET['opST']='I';
       $this->assertEquals(true, $this->object->lista("A"));
    }

}
