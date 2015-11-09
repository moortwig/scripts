<?php

// Calculates the hypotenuse, by given height and angle
fwrite(STDOUT, "Please enter height and angle as two integers respectively, separated by spacebar: ");

$line = trim(fgets(STDIN)); // string with no whitespace
$lineArray = explode(" ", $line); // separate input to array

// Check that there are correct amount of inputs
if (count($lineArray) > 2) {
	fwrite(STDERR, "There are too many entries. Try again!");
    exit();
}

if (count($lineArray) < 2) {
	fwrite(STDERR, "There are too few entries. Try again!");
    exit();
}

// intval gives a 0 if the string doesnt contain numbers, so we can use this in the if statements below
// array_pop takes the last value and removes it at the same time from the array
$angle = intval(array_pop($lineArray));
$side = intval(array_pop($lineArray));

// check that angle and side are within their limits
if (89 < $angle || $angle < 1 ) {
	fwrite(STDERR, "You didn't put in correct data! Please try again.");
    exit();
}

if (10000 < $side || $side < 1 ) {
	fwrite(STDERR, "You didn't put in correct data! Please try again.");
    exit();
}

$ratio = sin(deg2rad($angle)); // get ratio of sine (converted from angle degree to radians)
$hypotenuse = ceil($side/$ratio); // round up to higher integer
fwrite(STDOUT, "$hypotenuse");

exit(0); // exit with no errors
?>