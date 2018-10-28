<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleTipoCobranca.php');
class DaoControleTipoCobrancaTest extends TesteCase {

    /**
     * @var DaoControleTipoCobranca
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoControleTipoCobranca;
        $_GET['id']='1';
        $_GET['descricao']='Tipo Cobranca';
        $_GET['sigla']='TC';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoControleTipoCobranca::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('TIPO_COBRANCA', $this->object->getTabela());
    }

    /**
     * @covers DaoControleTipoCobranca::getClassModel
     * @todo   Implement testGetClassModel().
     */
    public function testGetClassModel() {
       $this->assertEquals('TipoCobranca', $this->object->getClassModel());
    }

    /**
     * @covers DaoControleTipoCobranca::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('ControleTipoCobranca', $this->object->getClassView());
    }

    /**
     * @covers DaoControleTipoCobranca::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoControleTipoCobranca::existe
     * @todo   Implement testExiste().
     */
    public function testExiste() {
       $this->assertEquals(true, $this->object->existe('1'));
       $this->assertEquals(false, $this->object->existe('0'));
    }

    /**
     * @covers DaoControleTipoCobranca::altera
     * @todo   Implement testAltera().
     */
    public function testAltera() {
       $this->assertEquals(true, $this->object->altera());
       $_GET['id']='0';
       $this->assertEquals(false, $this->object->altera());
    }

    /**
     * @covers DaoControleTipoCobranca::gravar
     * @todo   Implement testInsere().
     */
    public function testGravar() {
       $this->assertEquals(true, $this->object->gravar());
       $_GET['id']='0';
       $this->assertEquals(false, $this->object->gravar());
    }

    /**
     * @covers DaoControleTipoCobranca::apaga
     * @todo   Implement testApaga().
     */
    public function testApaga() {
       $this->assertEquals(true, $this->object->apaga('0'));
       $this->assertEquals(false, $this->object->apaga(''));
    }

    /**
     * @covers DaoControleTipoCobranca::insere
     * @todo   Implement testInsere().
     */
    public function testInsere() {
       $id = $this->object->retornaProximoID($this->object);
       $_GET['id']=$id;
       $_GET['descricao']='Tipo Cobranca ' . $id;
       $_GET['sigla']=''.$id;
       $this->assertEquals(true, $this->object->insere());
    }

    /**
     * @covers DaoControleTipoCobranca::ler
     * @todo   Implement testLer().
     */
    public function testLer() {
       $this->assertContains(true, $this->object->ler('1'));
       $this->assertContains(false, $this->object->ler('0'));
    }

    /**
     * @covers DaoControleTipoCobranca::lista
     * @todo   Implement testLista().
     */
    public function testLista() {
       $this->assertEquals(true, $this->object->lista());
       $this->assertEquals(true, $this->object->lista("A"));
    }

}
?>