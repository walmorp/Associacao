<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleAssociado.php');
  require_once (__APP_.'controller/FuncaoSistema.php');
class FuncaoSistemaTest extends TesteCase {

    /**
     * @var FuncaoSistema
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new FuncaoSistema();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers FuncaoSistema::opcaoSelecione
     * @todo   Implement testOpcaoSelecione().
     */
    public function testOpcaoSelecione() {
       $this->assertContains('[Selecione...]', $this->object->opcaoSelecione());
    }

    /**
     * @covers FuncaoSistema::getCampo
     * @todo   Implement testGetCampo().
     */
    public function testGetCampo() {
       $this->assertContains('app', $this->object->getCampo('app', 'app'));
       $_GET['campo']='campo';
       $this->assertContains('campo', $this->object->getCampo('campo'));
       $_POST['campo1']='campo1';
       $this->assertContains('campo1', $this->object->getCampo('campo1'));
    }

    /**
     * @covers FuncaoSistema::getCampoFalse
     * @todo   Implement testGetCampoFalse().
     */
    public function testGetCampoFalse() {
       $this->assertFalse($this->object->getCampoFalse('app'));
       $_GET['campo']='campo';
       $this->assertContains('campo', $this->object->getCampo('campo'));
       $_POST['campo1']='campo1';
       $this->assertContains('campo1', $this->object->getCampo('campo1'));
    }

    /**
     * @covers FuncaoSistema::campoExiste
     * @todo   Implement testCampoExiste().
     */
    public function testCampoExiste() {
       $this->assertFalse($this->object->campoExiste('app'));
       $_GET['campo']='campo';
       $this->assertTrue($this->object->campoExiste('campo'));
       $_POST['campo1']='campo1';
       $this->assertTrue($this->object->campoExiste('campo1'));
    }

    /**
     * @covers FuncaoSistema::arrumaDataHora
     * @todo   Implement testArrumaDataHora().
     */
    public function testArrumaDataHora() {
        $this->assertContains("[]", "[".$this->object->arrumaDataHora("00-00-0000 00:00:00"). "]");
        $this->assertContains("31/08/2018 00:00", $this->object->arrumaDataHora("08-31-2018 00:00"));
    }

    /**
     * @covers FuncaoSistema::arrumaData
     * @todo   Implement testArrumaData().
     */
    public function testArrumaData() {
        $this->assertContains("[]", "[".$this->object->arrumaData(("00-00-0000")). "]");
        $this->assertContains("31/08/2018", $this->object->arrumaData("08-31-2018"));
    }

    /**
     * @covers FuncaoSistema::formataValorDecimal
     * @todo   Implement testFormataValorDecimal().
     */
    public function testFormataValorDecimal() {
        $this->assertContains("[]", "[".$this->object->formataValorDecimal(("")). "]");
        $this->assertContains("[]", "[".$this->object->formataValorDecimal((null)). "]");
        $this->assertContains("1000.00", $this->object->formataValorDecimal("1000"));
        $this->assertContains("1001.12", $this->object->formataValorDecimal("1001.12222"));
        $this->assertContains("1001.13", $this->object->formataValorDecimal("1001.12567"));
    }

    /**
     * @covers FuncaoSistema::converteDataParaIB
     * @todo   Implement testConverteDataParaIB().
     */
    public function testConverteDataParaIB() {
        $this->assertContains("Null", $this->object->converteDataParaIB(""));
        $this->assertContains("Null", $this->object->converteDataParaIB(null));
        $this->assertContains("Null", $this->object->converteDataParaIB(NULL));
        $this->assertContains("2018/08/31", $this->object->converteDataParaIB("31/08/2018"));
        $this->assertContains("Data inválida", $this->object->converteDataParaIB("2018/08/31"));
        $this->assertContains("Data inválida", $this->object->converteDataParaIB("08/31/2018"));
        $this->assertContains("Data inválida", $this->object->converteDataParaIB("2018"));
    }

    /**
     * @covers FuncaoSistema::converteDataHoraParaIB
     * @todo   Implement testConverteDataHoraParaIB().
     */
    public function testConverteDataHoraParaIB() {
        $this->assertContains("Null", $this->object->converteDataHoraParaIB(""));
        $this->assertContains("Null", $this->object->converteDataHoraParaIB(null));
        $this->assertContains("Null", $this->object->converteDataHoraParaIB(NULL));
        $this->assertContains("2018/08/31 00:00:00", $this->object->converteDataHoraParaIB("31/08/2018 00:00:00"));
        $this->assertContains("Data/hora inválida", $this->object->converteDataHoraParaIB("2018/08/31 00:00:00"));
        $this->assertContains("Data/hora inválida", $this->object->converteDataHoraParaIB("08/31/2018 00:00:00"));
        $this->assertContains("Data/hora inválida", $this->object->converteDataHoraParaIB("2018"));
    }

    /**
     * @covers FuncaoSistema::iniciaDados
     * @todo   Implement testIniciaDados().
     */
    public function testIniciaDados() {
       $obj = new DaoControleAssociado();
       $this->assertCount(8, $obj->apagarDados($obj, 0));
    }

    /**
     * @covers FuncaoSistema::alterarDados
     * @todo   Implement testAlterarDados().
     */
    public function testAlterarDados() {
       $obj = new DaoControleAssociado();
       $this->assertCount(8, $obj->alterarDados($obj, 0));
    }

    /**
     * @covers FuncaoSistema::apagarDados
     * @todo   Implement testApagarDados().
     */
    public function testApagarDados() {
       $obj = new DaoControleAssociado();
       $this->assertCount(8, $obj->apagarDados($obj, 0));
       $this->assertEquals(false, $obj->apagarDados($obj, ""));
    }

    /**
     * @covers FuncaoSistema::consultarDados
     * @todo   Implement testConsultarDados().
     */
    public function testConsultarDados() {
       $obj = new DaoControleAssociado();
       $this->assertCount(8, $obj->consultarDados($obj, 1));
       $this->assertCount(8, $obj->consultarDados($obj, ""));
       //$this->assertEquals(false, $obj->consultarDados($obj, ""));
    }

    /**
     * @covers FuncaoSistema::montaDados
     * @todo   Implement testMontaDados().
     */
    public function testMontaDados() {
       $obj = new Conexao();
       $this->assertCount(1, $this->object->montaDados($obj->query("SELECT 'true' from rdb\$database")));
       $this->assertContains("true", $this->object->montaDados($obj->query("SELECT 'true' from rdb\$database")));
    }

    /**
     * @covers FuncaoSistema::mostraCampoID
     * @todo   Implement testMostraCampoID().
     */
    public function testMostraCampoID() {
       $this->assertContains("value='1'", $this->object->mostraCampoID("1"));
    }

    /**
     * @covers FuncaoSistema::retornaProximoID
     * @todo   Implement testRetornaProximoID().
     */
    public function testRetornaProximoID() {
       $obj = new DaoControleAssociado();
       $maxID = $this->object->montaDados($obj->query("SELECT MAX(ID) + 1 AS ID FROM ".$obj->getTabela()));
       $this->assertEquals($maxID['ID'], $obj->retornaProximoID($obj));
    }

    /**
     * @covers FuncaoSistema::mostraTabelaBDConectado
     * @todo   Implement testMostraTabelaBDConectado().
     */
    public function testMostraTabelaBDConectado() {
       $obj = new DaoControleAssociado();
       $this->assertEquals(true, $obj->mostraTabelaBDConectado($obj, "SELECT 'true' from rdb\$database", "", true));
       $_GET['opSA']='A';
       $_GET['opST']='A';
       $_GET['OperaRParc']='';
       $this->assertEquals(true, $obj->mostraTabelaBDConectado($obj, "SELECT 'true' from rdb\$database", "C", false));
    }

    /**
     * @covers FuncaoSistema::mostraAviso
     * @todo   Implement testMostraAviso().
     */
    public function testMostraAviso() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->mostraAviso());
    }

    /**
     * @covers FuncaoSistema::popularAssociadoCadParcelas
     * @todo   Implement testPopularAssociadoCadParcelas().
     */
    public function testPopularAssociadoCadParcelas() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularAssociadoCadParcelas($obj));
    }

    /**
     * @covers FuncaoSistema::popularAssociado
     * @todo   Implement testPopularAssociado().
     */
    public function testPopularAssociado() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularAssociado($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularTipoCobranca
     * @todo   Implement testPopularTipoCobranca().
     */
    public function testPopularTipoCobranca() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularTipoCobranca($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularSituacaoBaixa
     * @todo   Implement testPopularSituacaoBaixa().
     */
    public function testPopularSituacaoBaixa() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularSituacaoBaixa($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularTitulo
     * @todo   Implement testPopularTitulo().
     */
    public function testPopularTitulo() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularTitulo($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularTipoTitulo
     * @todo   Implement testPopularTipoTitulo().
     */
    public function testPopularTipoTitulo() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularTipoTitulo($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularSituacaoTitulo
     * @todo   Implement testPopularSituacaoTitulo().
     */
    public function testPopularSituacaoTitulo() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularSituacaoTitulo($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularGenero
     * @todo   Implement testPopularGenero().
     */
    public function testPopularGenero() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularGenero($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularCidade
     * @todo   Implement testPopularCidade().
     */
    public function testPopularCidade() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularCidade($obj, ""));
    }

    /**
     * @covers FuncaoSistema::popularSituacaoAssociado
     * @todo   Implement testPopularSituacaoAssociado().
     */
    public function testPopularSituacaoAssociado() {
       $obj = new Conexao();
       $this->assertEquals(true, $obj->popularSituacaoAssociado($obj, ""));
    }

}
