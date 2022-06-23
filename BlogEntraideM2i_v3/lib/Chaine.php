<?php

/**
 * Description of Chaine
 *
 * @author Pascal
 */
declare(strict_types = 1);

class Chaine {
    /*
     * Méthode camel2Snake()
     */

    /**
     * 
     * @param string $ch
     * @return string
     */
    public static function camel2Snake(string $ch): string {
        $s = "";

        //$s = strtolower(substr($ch, 0, 1));
        $s = strtolower($ch[0]);

        for ($i = 1; $i < strlen($ch); $i++) {
            //if ($ch[$i] >= "A" && $ch[$i] <= "Z") {
            if ($ch[$i] === strtoupper($ch[$i])) {
                $s .= "_" . strtolower($ch[$i]);
            } else {
                $s .= strtolower($ch[$i]);
            }
        }

        return $s;
    }

    /*
     * Méthode snake2Camel()
     */

    /**
     * 
     * @param string $ch
     * @param string $classe
     * @return string
     */
    public static function snake2Camel(string $ch, string $classe): string {
        $s = "";

        $t = explode("_", $ch);
        if ($classe == "classe") {
            $s = strtoupper($t[0][0]) . strtolower(substr($t[0], 1));
        } else {
            $s = strtolower($t[0]);
        }
        for ($i = 1; $i < count($t); $i++) {
            $s .= strtoupper($t[$i][0]) . strtolower(substr($t[$i], 1));
        }

        return $s;
    }

}
