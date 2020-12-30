<?php
namespace GuiGralho\AfdGenerator;

use GuiGralho\Util;
use GuiGralho\AfdGeneratorHeader;
use GuiGralho\AfdGeneratorContent;
use GuiGralho\AfdGeneratorTrailer;

/**
 * Class AfdGenerator
 */
class AfdGenerator
{
	/**
	 * Caracter de fim de linha
	 *
	 * @var string
	 */
	protected $fimLinha = "\r\n";

	/**
	 * Caracter de fim de arquivo
	 *
	 * @var null
	 */
	protected $fimArquivo = "\r\n";

	/**
	 * @var string
	 */
	protected $header;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * @var string
	 */
	protected $trailer;

	/**
	 * @return mixed
	 */
	public function getHeader()
	{
		return $this->header;
	}

	/**
	 * @param mixed $header
	 */
	public function setHeader($header)
	{
		$AfdGeneratorHeader = new AfdGeneratorHeader($header);
		$this->header = $AfdGeneratorHeader->generate();
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent($content)
	{
		foreach ($content as $key => $item) {
			$item['nsr'] = $key+1;

			$AfdGeneratorContent = new AfdGeneratorContent($item);
			$this->content .= $AfdGeneratorContent->generate() . $this->fimLinha;
		}
	}

	/**
	 * @return mixed
	 */
	public function getTrailer()
	{
		return $this->trailer;
	}

	/**
	 * @param mixed $trailer
	 */
	public function setTrailer($trailer)
	{
		$AfdGeneratorTrailer = new AfdGeneratorTrailer($trailer);
		$this->trailer = $AfdGeneratorTrailer->generate();
	}

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
	 * retorna o arquivo afd completo
	 * @return string
	 */
	public function generate()
	{
		$string = $this->getHeader() . $this->fimLinha;
		$string .= $this->getContent();
		$string .= $this->getTrailer() . $this->fimArquivo;

		return $string;
	}

    /**
     * Realiza o download da string retornada do metodo gerar
     *
     * @param null $filename
     *
     * @throws \Exception
     */
    public function download($filename = null)
    {
        if ($filename === null) {
            $filename = 'remessa.txt';
        }
        header('Content-type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $this->generate();
    }
}
