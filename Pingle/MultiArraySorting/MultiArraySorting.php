<?php
namespace Pingle;
/**
 * Class MultiArraySorting
 * @package Pingle
 */
class MultiArraySorting {

    /**
     * - store the field to sort
     * @var type
     */
    private $field = "";

    /**
     * -constructor to set the field
     * @param type $field
     * @return type
     */
    function __construct($field = null) {
        if (is_null($field))
            return;
        $this->field = $field;
    }

    /**
     * - function to sort array by descending
     * @param array $array
     * @param type $field
     * @return type
     */
    function Descending(Array $array, $field) {
        if (is_numeric($array[0][$field])) {
            usort($array, array(new MultiArraySorting($field), 'numberSort'));
        } else {
            usort($array, array(new MultiArraySorting($field), 'textSort'));
        }
        $array = array_reverse($array);
        return $array;
    }

    /**
     * - function to sort array by ascending
     * @param array $array
     * @param type $field
     * @return array
     */
    function Ascending(Array $array, $field) {
        if (is_numeric($array[0][$field])) {
            usort($array, array(new MultiArraySorting($field), 'numberSort'));
        } else {
            usort($array, array(new MultiArraySorting($field), 'textSort'));
        }
        return $array;
    }

    /**
     * - number sort function
     * @param type $a
     * @param type $b
     * @return int
     */
    private function numberSort($a, $b) {
        if ($a[$this->field] == $b[$this->field])
            return 0;
        return $a[$this->field] > $b[$this->field] ? 1 : -1;
    }

    /**
     * - text sort function
     * @param type $a
     * @param type $b
     * @return type
     */
    private function textSort($a, $b) {
        return strcmp($a[$this->field], $b[$this->field]);
    }

}
