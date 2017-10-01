<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mocha & Chai</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.4.2/mocha.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.4.2/mocha.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chai/4.0.2/chai.js"></script>
</head>
<body>

<!-- A container element for the visual Mocha results -->
<div id="mocha"></div>

<script>

    const log = o => console.log(o);

    const isPrime = num => {
        for (let i = 2; i < num; i++)
            if (num % i === 0) return false;
        return (num !== 0 && num !== 1);
    };

    const factorial = num => {
        return num > 0 ? num * factorial(num - 1) : 1;
    };

    const fibonacci = num => {
        if (num === 0) return 0;
        else if (num === 1) return 1;
        else return fibonacci(num - 1) + fibonacci(num - 2);
    };

    const isSorted = arr => {
        let prevVal, isSorted = true;
        const compareValWithPrevVal = (val, key) => {
            if (key === 0 || val > prevVal)
                prevVal = val;
            else
                isSorted = false;
        };
        arr.forEach(compareValWithPrevVal);
        return isSorted;
    };

    let is_balanced = true;

    const isBalanced = str => {
        if (str.length) {
            let open = str.indexOf("{");
            let close = str.lastIndexOf("}");
            if (close < open) {
                is_balanced = false;
            }
            else if (open === -1 && close !== -1) {
                is_balanced = false;
            }
            else {
                isBalanced(str.substring(open + 1, close));
            }
        }
        return is_balanced;
    };

    const isMatchingPair = (char1, char2) => {
        if (char1 === '(' && char2 === ')')
            return true;
        else if (char1 === '{' && char2 === '}')
            return true;
        else return char1 == '[' && char2 == ']';
    };

    const isBalancedUni = str => {
        const exp = str.split("");
        const st = [];

        for (let i = 0; i < exp.length; i++) {
            if (exp[i] === '{' || exp[i] === '(' || exp[i] === '[') {
                st.push(exp[i]);
            }
            else if (exp[i] === '}' || exp[i] === ')' || exp[i] === ']') {
                if (st.length === 0)
                    return false;
                else if (!isMatchingPair(st.pop(), exp[i]))
                    return false;
            }
        }
        return st.length === 0;
    };
</script>

<!-- Mocha setup and initiation code -->
<script>
    mocha.setup('bdd');
    const assert = chai.assert;
    window.onload = function () {
        mocha.run();
    };
</script>

<!-- The script under test -->
<script>
    describe('INTERVIEW', function () {
        it('should return TRUE if (2, 3, 5, 7, 13, 17) is prime', function () {
            assert.equal(isPrime(2), true);
            assert.equal(isPrime(3), true);
            assert.equal(isPrime(5), true);
            assert.equal(isPrime(7), true);
            assert.equal(isPrime(13), true);
            assert.equal(isPrime(17), true);
        });

        it('should return FALSE if (0, 1, 6, 22, 27, 1000) is NOT prime', function () {
            assert.equal(isPrime(0), false);
            assert.equal(isPrime(1), false);
            assert.equal(isPrime(6), false);
            assert.equal(isPrime(22), false);
            assert.equal(isPrime(27), false);
            assert.equal(isPrime(1000), false);
        });

        it('should return Factorial', function () {
            assert.equal(factorial(0), 1);
            assert.equal(factorial(1), 1);
            assert.equal(factorial(2), 2);
            assert.equal(factorial(3), 6);
            assert.equal(factorial(4), 24);
            assert.equal(factorial(5), 120);
            assert.equal(factorial(6), 720);
        });

        it('should return Fibonacci', function () {
            assert.equal(fibonacci(0), 0);
            assert.equal(fibonacci(1), 1);
            assert.equal(fibonacci(2), 1);
            assert.equal(fibonacci(3), 2);
            assert.equal(fibonacci(4), 3);
            assert.equal(fibonacci(10), 55);
            assert.equal(fibonacci(20), 6765);
        });

        it('should check if array isSorted', function () {
            assert.equal(isSorted([]), true);
            assert.equal(isSorted([1, 2, 3]), true);
            assert.equal(isSorted([-5, 0, 3, 9]), true);
            assert.equal(isSorted([-Infinity, -5, 0, 3, 9]), true);
            assert.equal(isSorted([3, 9, -3, 10]), false);
        });

        it('should check if "foo { bar { baz } boo }" is isBalanced', function () {
            assert.equal(isBalanced('foo { bar { baz } boo }'), true);
            assert.equal(isBalanced('}{'), false);
            assert.equal(isBalanced('{{}'), false);
            assert.equal(isBalanced('{}{}'), false);
            assert.equal(isBalanced('foo { bar { baz }'), false);
            assert.equal(isBalanced('foo { bar } }'), false);
        });

        it('should check if "(foo { bar (baz) [boo] })" is isBalanced2', function () {
            assert.equal(isBalancedUni('}{'), false);
            assert.equal(isBalancedUni('(foo { bar (baz) [boo] })'), true);
            assert.equal(isBalancedUni('foo { bar { baz }'), false);
            assert.equal(isBalancedUni('foo { ( bar [baz ] } )'), false); // a string with interleaving braces should return false
        });

        log('ok');
    });
</script>

</body>
</html>