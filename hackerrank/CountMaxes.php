<?php
require __DIR__ . '/includes/functions.php';

$input_file = __DIR__ . '/input/CountMaxes.txt';
$output_file = __DIR__ . '/output/CountMaxes.txt';

$_fp = openFile($input_file);

class CountMaxes
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
            $numbers = array();
            $maxes = array();
            $row = 0;
            while (($line = fgets($this->_fp)) !== false) {
                $line = trim($line);
                if ($row++ === 0)
                    $maxes = explode(' ', $line);
                else
                    $numbers[] = $line;
            }

            $maxes_cnt = $this->countMaxes($numbers, $maxes);

            foreach ($maxes_cnt as $v)
                $this->output .= $v . ' ';
            $this->output = rtrim($this->output);

            fclose($this->_fp);
        }
    }

    /**
     * @param array $maxes
     * @param array $numbers
     * @return array
     */
    public function countMaxes($numbers, $maxes)
    {
        // Build unique array with counters of numbers.
        // It will allow us to use smaller array in a nested foreach
        $numbers_cnt = array();
        foreach ($numbers as $num) {
            if (!isset($numbers_cnt[$num]))
                $numbers_cnt[$num] = 0;
            $numbers_cnt[$num] += 1;
        }

        // Free some memory. This big array is not needed any more
        unset($numbers);

        // Sort numbers counters
        ksort($numbers_cnt);

        // Count maxes
        $maxes_cnt = array();
        foreach ($maxes as $k => $max) {
            if (!isset($maxes_cnt[$k]))
                $maxes_cnt[$k] = 0;
            foreach ($numbers_cnt as $num => $num_cnt) {
                if ($num <= $max)
                    $maxes_cnt[$k] += $num_cnt;
                else
                    break; // No need to compare other numbers, while counters of numbers are sorted
            }
        }
        return $maxes_cnt;
    }
}

$countMaxes = new CountMaxes($_fp);
$countMaxes->execute();

testOutput($countMaxes->getOutput(), $output_file);