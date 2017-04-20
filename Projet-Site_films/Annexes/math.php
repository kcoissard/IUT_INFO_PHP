<?php

abstract class Expression {
    abstract public function compute();
}

class Value extends Expression {
    private $value;
    public function __construct($value) {
        $this->value = $value;
    }
    public function compute() {
        return $this->value;
    }
}

abstract class Operation extends Expression {
    protected $leftExpr;
    protected $rightExpr;
    public function __construct($leftExpr, $rightExpr) {
        $this->leftExpr = $leftExpr;
        $this->rightExpr = $rightExpr;
    }
}

class Plus extends Operation {
    public function compute() {
        return $this->leftExpr->compute() + $this->rightExpr->compute();
    }
}

class Multiply extends Operation {
    public function compute() {
        return $this->leftExpr->compute() * $this->rightExpr->compute();
    }
}

//$sous_expr = new Multiply(new Value(3), new Value(5));
//echo $sous_expr->compute()."\n";
//$expr = new Plus(new Value(2), $sous_expr);
$expr = new Plus(new Value(2), new Multiply(new Value(3), new Value(5)));
echo $expr->compute()."\n";
