<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Observer Pattern</title>
<style type="text/css">
* {
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-size: 1;
  line-height: 2;
  padding: 2rem;
  background-color: #faf9f9;
}

input {
  width: 100%;
  display: block;
  margin-bottom: 1rem;
  font: inherit;
  line-height: 3rem;
  padding: 0 1rem;
}

button {
  font: inherit;
  line-height: 2rem;
  padding: 0 1rem;
}

p {
  margin-bottom: 1rem;
}
p::before {
  opacity: .5;
  margin-right: .5rem;
}
p:nth-of-type(1)::before {
  content: 'p1: ';
}
p:nth-of-type(2)::before {
  content: 'p3: ';
}
p:nth-of-type(3)::before {
  content: 'p3: ';
}
</style>
</head>
<body>

<input type="text" class="js-input" placeholder="type something here" value="Hello">
<button class="js-subscribe-p1">Subscrube</button>
<button class="js-unsubscribe-p1">Unsubscribe</button>
<p class="js-p1"></p>
<button class="js-subscribe-p2">Subscrube</button>
<button class="js-unsubscribe-p2">Unsubscribe</button>
<p class="js-p2"></p>
<button class="js-subscribe-p3">Subscrube</button>
<button class="js-unsubscribe-p3">Unsubscribe</button>
<p class="js-p3"></p>

<script>
	const log = o => console.log(o);

	class Observable {
	  constructor() {
	    this.observers = [];
	  }

	  subscribe(f) {
	  	f(input.value);
	    this.observers.push(f);
	  }

	  unsubscribe(f) {
	    this.observers = this.observers.filter(subscriber => subscriber !== f);
	  }

	  notify(data) {
	  	log(data);
	    this.observers.forEach(observer => observer(data));
	  }
	}

	const input = document.querySelector('.js-input');

	const p1 = document.querySelector('.js-p1');
	const p2 = document.querySelector('.js-p2');
	const p3 = document.querySelector('.js-p3');

	const subscribeP1 = document.querySelector('.js-subscribe-p1');
	const subscribeP2 = document.querySelector('.js-subscribe-p2');
	const subscribeP3 = document.querySelector('.js-subscribe-p3');

	const unsubscribeP1 = document.querySelector('.js-unsubscribe-p1');
	const unsubscribeP2 = document.querySelector('.js-unsubscribe-p2');
	const unsubscribeP3 = document.querySelector('.js-unsubscribe-p3');

	const updateP1 = text => p1.textContent = text;
	const updateP2 = text => p2.textContent = text;
	const updateP3 = text => p3.textContent = text;
	
	const headingsObserver = new Observable();
	headingsObserver.subscribe(updateP1);
	headingsObserver.subscribe(updateP2);
	headingsObserver.subscribe(updateP3);

	subscribeP1.addEventListener('click', () => headingsObserver.subscribe(updateP1));
	unsubscribeP1.addEventListener('click', () => headingsObserver.unsubscribe(updateP1));
	subscribeP2.addEventListener('click', () => headingsObserver.subscribe(updateP2));
	unsubscribeP2.addEventListener('click', () => headingsObserver.unsubscribe(updateP2));
	subscribeP3.addEventListener('click', () => headingsObserver.subscribe(updateP3));
	unsubscribeP3.addEventListener('click', () => headingsObserver.unsubscribe(updateP3));

	input.addEventListener('keyup', e => {
	  headingsObserver.notify(e.target.value);
	});

    log('ok');

</script>
</body>
</html>