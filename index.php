<?php

        //Наследование

class A{
    private $f;

    public function __construct(int $f)
    {
        $this->f = $f;
    }

    public function getF(){
        return $this->f;
    }

    public function dosomething(){
        echo $this->f."....do something";
    }
}

class B extends A {
    public function __construct($f)
    {
        parent::__construct($f);
    }
    public function dosomething(){
        echo $this->getF()."....do another something";
    }
}

function f(A $x){
    $x->dosomething();
}

/*$a = new B(5);
f($a);*/

    //Abstract

abstract class Doa{
    public function do(){
        echo "DO A";
    }
    public abstract function abstr();
}

class fromAbstr extends Doa{
    public function abstr()
    {
        echo "abstr";
    }
}

function fun(Doa $x){
    $x->abstr();
}

/*$x = new fromAbstr();
fun($x);*/


        //Interface self


interface newIn{
    public function getArgA();
    public function getArgB();
    public function getActionAB();
}

class Sum implements newIn{

    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getArgA()
    {
        echo "Arg A: $this->a";
    }

    public function getArgB()
    {
        echo "Arg B: $this->b";
    }

    public function getActionAB()
    {
        echo "Sum A+B: ".($this->a+$this->b);
    }
}

class Mult implements newIn{

    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getArgA()
    {
        echo "Arg A: $this->a";
    }

    public function getArgB()
    {
        echo "Arg A: $this->b";
    }

    public function getActionAB()
    {
        echo "Multiply A*B: ".($this->a*$this->b);
    }
}

function showActions(newIn $a){
    $a->getArgA();
    $a->getArgB();
    $a->getActionAB();
}

/*$example = new Mult(5,6);
showActions($example);*/

        //Interface Hasher


interface HashAlgorithm{
    public function doHash(string $data):string;
}
interface HashManager{
    public function setAlg(HashAlgorithm $alg):void ;
    public function hash();
}

class StringHashManager implements HashManager{
    private $alg;
    private $data;

    public function setAlg(HashAlgorithm $alg): void
    {
        $this->alg = $alg;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function hash()
    {
        $this->data= $this->alg->doHash($this->data);
    }
}

class md5HashAlg implements HashAlgorithm{

    public function doHash(string $data): string
    {
        return md5($data);
    }
}

class sha256HashAlg implements HashAlgorithm{

    public function doHash(string $data): string
    {
        return hash("sha256",$data);
    }
}

$hm = new StringHashManager("vasia");
$hm->setAlg(new sha256HashAlg());
$hm->hash();
//echo $hm->getData();

        //Магические методы

class X {

    private $tostring = "class X to string";
    private $debuginfo = "class X vardamp";

    public function __toString()
    {
        return $this->tostring;
    }

    public function __debugInfo()
    {
        return ['debuginfo'=>$this->debuginfo];
    }
}

$x = new X();
echo $x;