<?php
// https://www.hackerrank.com/challenges/countingsort4/problem

require __DIR__ . '/includes/functions.php';

$input_file = __DIR__ . '/input/Interview.txt';
$output_file = __DIR__ . '/output/Interview.txt';

$_fp = openFile($input_file);

class Interview
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
            $output = '';
            while (($line = fgets($this->_fp)) !== false) {
                $output .= trim($line);
            }
            fclose($this->_fp);
            $this->output = $output;
        }
    }
}

$interview = new Interview($_fp);
$interview->execute();

testOutput($interview->getOutput(), $output_file);