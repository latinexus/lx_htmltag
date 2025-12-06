<?php
declare(strict_types=1);

namespace Latinexus\Html;

class HtmlTag
{
    public function __construct()
    {
    }

    public function blk(string $contenido = "", array $opt = [], string $envoltura = "div"): string
    {
        $atributo = $this->atributos($opt);
        $attrStr = $atributo !== "" ? ' ' . $atributo : '';
        return "<{$envoltura}{$attrStr}>{$contenido}</{$envoltura}>";
    }

    public function noBlk(array $opt = [], string $envoltura = "input"): string
    {
        $atributo = $this->atributos($opt);
        $attrStr = $atributo !== "" ? ' ' . $atributo : '';
        return "<{$envoltura}{$attrStr} />";
    }

    private function atributos(array $opt): string
    {
        $opcionales = ["required", "readonly", "disabled"];
        $blk = [];
        $hasId = false;

        foreach ($opt as $opId => $op) {
            $key = strtolower((string)$opId);

            if ($key === "id") {
                $val = (string)$op;
                if ($val === "") {
                    $val = 'id_' . uniqid();
                }
                $blk[] = 'id="' . htmlspecialchars($val, ENT_QUOTES, 'UTF-8') . '"';
                $hasId = true;
                continue;
            }

            if (in_array($key, $opcionales, true)) {
                // Incluir solo si el valor es truthy
                if ($op) {
                    $blk[] = $key;
                }
                continue;
            }

            // Atributos normales: omitir si están vacíos o nulos
            if ($op === null || $op === "") {
                continue;
            }

            $blk[] = $key . '="' . htmlspecialchars((string)$op, ENT_QUOTES, 'UTF-8') . '"';
        }

        if (!$hasId) {
            $blk[] = 'id="' . 'id_' . uniqid() . '"';
        }

        return implode(" ", $blk);
    }
}

