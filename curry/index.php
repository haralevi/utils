<a href="http://codekirei.com/posts/currying-with-arrow-functions/">http://codekirei.com/posts/currying-with-arrow-functions/</a>

<div id="app"></div>

<script type="application/javascript">
    let res, html = "";

    const testArr = [10, 15];
    const incrementBy = 3;

    const ensureNum = entity =>
        typeof entity === 'string' ? parseInt(entity) : entity;

    /* traditional way */
    const addNumbersOld = (a, b) => a + b;
    res = addNumbersOld(testArr[0], testArr[1]);
    console.log(res);
    html += res + "<br>";

    const incrementEachOld = (ar, by) =>
        ar.map(ensureNum)
            .map(num => addNumbersOld(num, by));

    res = incrementEachOld(testArr, incrementBy);
    console.log(res);
    html += res + "<br>";
    /* /traditional way */

    /* curry way */
    const addNumbers = a => b => a + b;
    res = addNumbers(testArr[0])(testArr[1]);
    console.log(res);
    html += res + "<br>";

    const incrementEach = (ar, by) =>
        ar.map(ensureNum)
            .map(addNumbers(by));
    res = incrementEach(testArr, incrementBy);
    console.log(res);
    html += res + "<br>";
    /* /curry way */

    document.getElementById("app").innerHTML = html;
</script>