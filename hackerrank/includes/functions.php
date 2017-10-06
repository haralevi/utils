<?php

function echox($s)
{
    echo $s . "<br>\n";
}

function printArr($arr)
{
    echo('<pre>');
    print_r($arr);
    echo('<pre>');
}

function openFile($file)
{
    $_fp = false;
    try {
        if ((file_exists($file)) === false)
            throw new Exception('Error, file "' . $file . '" not found');
        if (($_fp = fopen($file, "r")) === false)
            throw new Exception('Error, file "' . $file . '" open failed');
    } catch (\Exception $e) {
        echox('<div style="color :red;">' . $e->getMessage() . '</div>');
        printArr($e);
    }
    return $_fp;
}

function testOutput($output, $output_file)
{
    if (($_fp = openFile($output_file)) !== false) {
        $expected = '';
        while (($line = fgets($_fp)) !== false)
            $expected .= $line;
        $expected = trim($expected);
        fclose($_fp);

        echox('<div>' . $output . '</div>');
        if ($output !== $expected)
            echox('<div style="color :red;">ERROR, NOT EQUAL</div>');
        else
            echox('<div style="color :green;">OK, EQUAL</div>');
        echox('<div>' . $expected . '</div>');
    }
}