<?php

function validateNumber($number) {
    if (!is_numeric($number)) {
        die("Invalid input: Must be a number.");
    }

    if ($number < 0) {
        die("Invalid input: Price and Quantity cannot be negative.");
    }

    return $number;
}
?>