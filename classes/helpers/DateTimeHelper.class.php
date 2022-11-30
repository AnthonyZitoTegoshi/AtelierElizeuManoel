<?php

class DateTimeHelper {
    static function compare($firstDate, $secondDate) {
        if ($firstDate->format("Y") > $secondDate->format("Y")) {
            return 1;
        }
        if ($firstDate->format("Y") < $secondDate->format("Y")) {
            return -1;
        }
        if ($firstDate->format("m") > $secondDate->format("m")) {
            return 1;
        }
        if ($firstDate->format("m") < $secondDate->format("m")) {
            return -1;
        }
        if ($firstDate->format("d") > $secondDate->format("d")) {
            return 1;
        }
        if ($firstDate->format("d") < $secondDate->format("d")) {
            return -1;
        }
        if ($firstDate->format("H") > $secondDate->format("H")) {
            return 1;
        }
        if ($firstDate->format("H") < $secondDate->format("H")) {
            return -1;
        }
        if ($firstDate->format("i") > $secondDate->format("i")) {
            return 1;
        }
        if ($firstDate->format("i") < $secondDate->format("i")) {
            return -1;
        }
        if ($firstDate->format("s") > $secondDate->format("s")) {
            return 1;
        }
        if ($firstDate->format("s") < $secondDate->format("s")) {
            return -1;
        }
        return 0;
    }
}

?>