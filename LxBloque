<?php
namespace LxBloque;

class LxBloque
{
    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        // Puedes realizar cualquier inicialización necesaria aquí
    }

    /**
     * Genera una etiqueta HTML con apertura y cierre
     *
     * @param string $contenido Contenido dentro de la etiqueta
     * @param array $opt Atributos de la etiqueta
     * @param string $envoltura Nombre de la etiqueta
     * @return string
     */
    public function blk($contenido = "", array $opt = [], $envoltura = "div")
    {
        $params = $this->params($opt);
        return "<" . $envoltura . " " . $params . ">" . $contenido . "</" . $envoltura . ">";
    }

    /**
     * Genera una etiqueta HTML de autocierre
     *
     * @param array $opt Atributos de la etiqueta
     * @param string $envoltura Nombre de la etiqueta
     * @return string
     */
    public function noBlk(array $opt = [], $envoltura = "input")
    {
        $params = $this->params($opt);
        return "<" . $envoltura . " " . $params . " />";
    }

    /**
     * Genera los atributos de la etiqueta HTML
     *
     * @param array $opt Atributos de la etiqueta
     * @return string
     */
    private function params($opt)
    {
        $opcionales = ["required", "readonly", "disabled"];
        $blk = [];

        if (!empty($opt)) {
            foreach ($opt as $opId => $op) {
                if (strtolower($opId) == "id") {
                    $blk["id"] = !empty($op) ? 'id = "' . $op . '"' : 'id = "id_' . uniqid() . '"';
                } else {
                    if (in_array($opId, $opcionales)) {
                        $blk[$opId] = $opId . ' = ""';
                    } else {
                        $blk[$opId] = !empty($op) ? $opId . ' = "' . $op . '"' : "";
                    }
                }
            }

            if (!isset($blk["id"])) {
                $blk["id"] = 'id = "id_' . uniqid() . '"';
            }

            $optRetorno = implode(" ", $blk);
        } else {
            $optRetorno = "";
        }

        return $optRetorno;
    }
}
