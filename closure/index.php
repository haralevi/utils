<a href="https://medium.com/javascript-scene/master-the-javascript-interview-what-is-a-closure-b2f0d2152b36">https://medium.com/javascript-scene/master-the-javascript-interview-what-is-a-closure-b2f0d2152b36</a>

<div id="app"></div>

<script type="application/javascript">
    let res, mySecret, html = "";

    const log = (res) => {
        console.log(res);
        html += res + "<br>";
    };

    const getSecret = (secret) => {
        return {
            get: () => secret
        };
    };
    mySecret = getSecret('My secret simple');
    res = mySecret.get();
    log(res);

    const getSecrets = msg => () => msg;

    mySecret = getSecrets('My secret curried');
    res = mySecret();
    log(res);

    res = getSecrets('My secret really curried')();
    log(res);

    document.getElementById("app").innerHTML = html;
</script>