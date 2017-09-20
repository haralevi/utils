<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Functional</title>
</head>
<body>

<div id="root"></div>

<script>
	const root = document.getElementById("root");

	const log = o => console.log(o);

	const map = fn => array => array.map(fn);
	const multiply = x => y => x * y;
	const pluck = key => object => object[key];

	const discount = multiply(0.98);
	const tax = multiply(1.0925);

	const url = 'prices.php';

	const request = defaults => async options => {
		options = Object.assign({}, defaults, options);
		const resp = await fetch(options.url, options.headers);
		return resp.json();
	};

	const customRequest = request({
		headers: {
			'method': 'POST',
			'X-Custom': 'mykey'
		}
	});

	const resp = customRequest({ url: url });

	resp.then(map(pluck('price')))
		.then(map(discount))
		.then(map(tax))
		.then(prices => printPrices(prices));
		
	const printPrices = prices => {
		prices.map(price => {
			const p = document.createElement("p");
			const t = document.createTextNode(price.toFixed(3));
			p.appendChild(t);
			root.appendChild(p);
		});
	};

	log('ok');
</script>
</body>
</html>