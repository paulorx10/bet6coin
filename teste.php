<?php
/*function add_string(&$string)
{
    $string .= ' e alguma coisa mais add.';
}
$str = 'Isto é uma string,';
add_string($str);
echo $str;    // imprime 'Isto é uma string, e alguma coisa mais.'
*/

?>

<?php
/*function makecoffee($type = "cappuccino")
{
    return "Fazendo uma xícara de café $type.\n";
}
echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");*/

/*function helloword($hello = "hello word"){

	return "Esse é um simples $hello.\n<br>";
}

echo helloword();
echo helloword("global");
echo helloword("simples e normal");
*/

/*function iogurtera ($sabor, $tipo = "azeda")
{
    return "Fazendo uma taça de $sabor $tipo.\n";
}

echo iogurtera ("morango");  */

/*class C {}

function f(C $c = null) {
   echo $c = "null";
   echo $d = "nulled";
}

f(new C);
*/

/*function soma($num){

return $num+$num;

}
echo soma(4);
*/


/*function bar($arg = 'hello')
{
    echo "Chamou bar(); com argumento '$arg'.<br />\n";
}

echo bar(); */
/*function foo() {
    echo "Chamou foo()<br>\n";
}

function bar($arg = '')
{
    echo "Chamou bar(); com argumento '$arg'.<br />\n";
}

// Essa eh uma funcao wrapper para echo()
function echoit($string)
{
    echo "echoit ".$string;
}

$func = 'foo';
$func();        // Chama foo()

$func = 'bar';
$func('test');  // Chama bar()

$func = 'echoit';
$func('test');  // Chama echoit() 

function chama ($ar = ''){
	echo "funcao chama com '$ar'";
}

$func = 'chama';
$func('chamada');*/
/*class Foo
{
    function MetodoVariavel()
    {
        $name = 'Bar';
        $this->$name(); // Isto chama o método Bar()
    }

    function Bar()
    {
        echo "Bar foi chamada!";
    }
}

$foo = new Foo();
$funcname = "MetodoVariavel";
$foo->$funcname();  // Isto chama $foo->MetodoVariavel()
*/
/*class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected $products = array();

    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] :
               FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };

        array_walk($this->products, $callback);
        return "Total: <b>".round($total, 2)."</b>";
    }
}

$my_cart = new Cart;

// Add some items to the cart

$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// Print the total with a 5% sales tax.
print $my_cart->getTotal(0.05) . "\n";
// The result is 54.29*/


class SimpleClass
{
    // declaração de propriedade
    public $var = 'um valor padrão';

    public $varr = " esse aqui";
    
    // declaração de método
	public function displayVar() {
        echo $this->var;
    }

    public function varr(){
    	echo $this->varr;
    }

    public function sum($num){
    	echo $num * $num;
    }
}

$a = new SimpleClass();
$a->displayVar();
$a->varr();

?>

