<?php
// https://www.hackerrank.com/challenges/countingsort4/problem

require __DIR__ . '/includes/functions.php';

$input_file = __DIR__ . '/input/FullCountingSort.txt';
$output_file = __DIR__ . '/output/FullCountingSort.txt';

$_fp = openFile($input_file);

class FullCountingSort
{
    private $_fp;
    private $output;

    /**
     * @param resource $_fp
     */
    public function __construct($_fp)
    {
        $this->_fp = $_fp;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    public function execute()
    {
        if ($this->_fp !== false) {
            $delimiter = ' ';
            $raw_arr = array();
            $raw_arr_half_size = 0;
            while (($line = fgets($this->_fp)) !== false) {
                if (strstr($line, $delimiter) !== false)
                    $raw_arr[] = trim($line);
                else
                    $raw_arr_half_size = floor((intval($line) / 2));
            }
            fclose($this->_fp);

            $row_num = 0;
            $unsorted_arr = array();
            foreach ($raw_arr as $line) {
                if (strstr($line, $delimiter) !== false) {
                    $line = explode($delimiter, $line);
                    $key = trim($line[0]);
                    $val = trim($line[1]);
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
                    $this->output .= $val . ' ';
            }
            $this->output = rtrim($this->output);
        }
    }
}

$fullCountingSort = new FullCountingSort($_fp);
$fullCountingSort->execute();

testOutput($fullCountingSort->getOutput(), $output_file);