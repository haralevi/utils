<?php
// https://www.hackerrank.com/challenges/countingsort4/problem

require __DIR__ . '/includes/functions.php';

$input_file = __DIR__ . '/input/FullCountingSort.txt';
$output_file = __DIR__ . '/output/FullCountingSort.txt';

$output = '';

if ($_fp = openFile($input_file)) {
    $delimiter = ' ';
    $raw_arr = array();
    $raw_arr_half_size = 0;
    while (($line = fgets($_fp)) !== false) {
        if (strstr($line, $delimiter))
            $raw_arr[] = trim($line);
        else
            $raw_arr_half_size = floor((intval($line) / 2));
    }
    fclose($_fp);

    $row_num = 0;
    $unsorted_arr = array();
    foreach ($raw_arr as $line) {
        if (strstr($line, $delimiter)) {
            $line = explode($delimiter, $line);
            $val = trim($line[1]);
            $key = trim($line[0]);
            if ($row_num++ >= $raw_arr_half_size)
                $unsorted_arr[$key][] = $val;
            else
                $unsorted_arr[$key][] = '-';
        }
    }

    ksort($unsorted_arr);
    foreach ($unsorted_arr as $unsorted_sub_arr) {
        ksort($unsorted_sub_arr);
        foreach ($unsorted_sub_arr as $val)
            $output .= $val . ' ';
    }
    $output = rtrim($output);
}

testOutput($output, $output_file);