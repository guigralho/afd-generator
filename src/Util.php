<?php
namespace GuiGralho\AfdGenerator;

class Util
{
    /**
     * Função para add valor a linha nas posições informadas.
     *
     * @param $line
     * @param integer $i
     * @param integer $f
     * @param $value
     *
     * @return array
     * @throws \Exception
     */
    public static function adiciona(&$line, $i, $f, $value)
    {
        $i--;

        $t = $f - $i;

        $value = sprintf("%{$t}s", $value);
        $value = preg_split('//u', $value, -1, PREG_SPLIT_NO_EMPTY) + array_fill(0, $t, '');

        return array_splice($line, $i, $t, $value);
    }

    /**
     * @param object $obj
     * @param array  $params
     */
    public static function fillClass(&$obj, array $params)
    {
        foreach ($params as $param => $value) {
            $param = str_replace(' ', '', ucwords(str_replace('_', ' ', $param)));
            if (method_exists($obj, 'getProtectedFields') && in_array(lcfirst($param), $obj->getProtectedFields())) {
                continue;
            }
            if (method_exists($obj, 'set' . ucwords($param))) {
                $obj->{'set' . ucwords($param)}($value);
            }
        }
    }

	public static function fillZero($campo, $tamanho, $type){
		$campo = substr($campo, 0, $tamanho);
		$cp = str_pad($campo, $tamanho, 0, $type);
		return $cp;
	}
}
