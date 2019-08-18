<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class livemumtowordclsconvert {
    function mycustom_convert_num($livenum) {
        if (($livenum < 0) || ($livenum > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $num_giga = floor($livenum / 1000000);
        // Millions (num_giga)
        $livenum -= $num_giga * 1000000;
        $num_kilo = floor($livenum / 1000);
        // Thousands (num_kilo)
        $livenum -= $num_kilo * 1000;
        $num_hecto = floor($livenum / 100);
        // Hundreds (num_hecto)
        $livenum -= $num_hecto * 100;
        $num_deca = floor($livenum / 10);
        // Tens (num_deca)
        $n = $livenum % 10;
        // Ones
        $output = "";
        if ($num_giga) {
            $output .= $this->mycustom_convert_num($num_giga) .  "Million";
        }
        if ($num_kilo) {
            $output .= (empty($output) ? "" : " ") .$this->mycustom_convert_num($num_kilo) . " Thousand";
        }
        if ($num_hecto) {
            $output .= (empty($output) ? "" : " ") .$this->mycustom_convert_num($num_hecto) . " Hundred";
        }
        $first = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $numtens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($num_deca || $n) {
            if (!empty($output)) {
                $output .= " and ";
            }
            if ($num_deca < 2) {
                $output .= $first[$num_deca * 10 + $n];
            } else {
                $output .= $numtens[$num_deca];
                if ($n) {
                    $output .= "-" . $first[$n];
                }
            }
        }
        if (empty($output)) {
            $output = "zero";
        }
        return $output;
    }
}
?>