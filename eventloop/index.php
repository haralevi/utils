<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Loop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>

<input type="button" id="Alert" name="Alert" value="Alert">
<input type="button" id="Run" name="Run" value="Run">

<div id="root"></div>

<script>
    const log = o => console.log(o);
    
    const f1 = () => log('f1');
    
    const r1 = () => setTimeout(f1, 1000);

    const a1 = () => {
		$.get("/ajax/get_work.php?id_photo=688449", function(data) {
	    	const name = data.photo[0].ph_name;
			$("#root").html(name);
			log(name);
		});
	};

    $("#Alert").on("click", function() {
    	log('alert');
    	alert("a1"); // blocks execution
    	a1();
    });

    $("#Run").on("click", function() {
    	log('run');
    	//alert("r1"); // blocks execution
    	r1();
		
    });

    log('ok');
   

</script>
</body>
</html>