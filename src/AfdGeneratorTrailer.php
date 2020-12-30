<?php
namespace GuiGralho\AfdGenerator;

use GuiGralho\Util;

/**
 * Class AfdGeneratorHeader
 */
class AfdGeneratorTrailer
{

	/**
	 * posição 001-009
	 * @var numeric
	 */
	protected $leading = '999999999';
	/**
	 * posição 010-018
	 * qtde de registros tipo 2 no arquivo
	 * @var numeric
	 */
	protected $qtdTipo2;
	/**
	 * posição 019-027
	 * qtde de registros tipo 3 no arquivo
	 * @var numeric
	 */
	protected $qtdTipo3;
	/**
	 * posição 028-036
	 * qtde de registros tipo 4 no arquivo
	 * @var numeric
	 */
	protected $qtdTipo4;
	/**
	 * posição 037-045
	 * qtde de registros tipo 5 no arquivo
	 * @var numeric
	 */
	protected $qtdTipo5;

	/**
	 * posição 046-046
	 * tipo do registro
	 * @var string
	 */
	protected $tipoRegistro = '9';

	/**
	 * @var
	 */
	protected $string;

	/**
	 * Construtor
	 *
	 * @param array $params Parâmetros iniciais para construção do objeto
	 */
	public function __construct($params = [])
	{
		Util::fillClass($this, $params);
	}

	/**
	 * @return float|int|string
	 */
	public function getLeading()
	{
		return $this->leading;
	}

	/**
	 * @return float|int|string
	 */
	public function getQtdTipo2()
	{
		return $this->qtdTipo2;
	}

	/**
	 * @param float|int|string $qtdTipo2
	 */
	public function setQtdTipo2($qtdTipo2)
	{
		$this->qtdTipo2 = $qtdTipo2;
	}

	/**
	 * @return float|int|string
	 */
	public function getQtdTipo3()
	{
		return $this->qtdTipo3;
	}

	/**
	 * @param float|int|string $qtdTipo3
	 */
	public function setQtdTipo3($qtdTipo3)
	{
		$this->qtdTipo3 = $qtdTipo3;
	}

	/**
	 * @return float|int|string
	 */
	public function getQtdTipo4()
	{
		return $this->qtdTipo4;
	}

	/**
	 * @param float|int|string $qtdTipo4
	 */
	public function setQtdTipo4($qtdTipo4)
	{
		$this->qtdTipo4 = $qtdTipo4;
	}

	/**
	 * @return float|int|string
	 */
	public function getQtdTipo5()
	{
		return $this->qtdTipo5;
	}

	/**
	 * @param float|int|string $qtdTipo5
	 */
	public function setQtdTipo5($qtdTipo5)
	{
		$this->qtdTipo5 = $qtdTipo5;
	}

	/**
	 * @return string
	 */
	public function getTipoRegistro()
	{
		return $this->tipoRegistro;
	}

	/**
	 * @return string
	 */
	public function generate()
	{
		$this->string = array_fill(0, 46, ' ');;

		Util::adiciona($this->string, 1, 9, $this->getLeading());
		Util::adiciona($this->string, 10, 18, Util::fillZero($this->getQtdTipo2(), 9, STR_PAD_LEFT));
		Util::adiciona($this->string, 19, 27, Util::fillZero($this->getQtdTipo3(), 9, STR_PAD_LEFT));
		Util::adiciona($this->string, 28, 36, Util::fillZero($this->getQtdTipo4(), 9, STR_PAD_LEFT));
		Util::adiciona($this->string, 37, 45, Util::fillZero($this->getQtdTipo5(), 9, STR_PAD_LEFT));
		Util::adiciona($this->string, 46, 46, $this->getTipoRegistro());

		return implode('', $this->string);
	}
}
