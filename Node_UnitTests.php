<?php
/**
 * Created by PhpStorm.
 * User: davidhamm
 * Date: 4/19/18
 * Time: 5:58 AM
 */

include_once("Node.php");

$a = new Node('A');
$b = new Node('B');
$c = new Node('C');
$d = new Node('D');
$e = new Node('E');
$f = new Node('F');

// Test addChild() and getChildren()
$a->addChild($b);
if (sizeof($a->getChildren()) !== 0) {
    echo "Methods: addChild() and getChildren() passed.\n";
} else {
    echo "Methods: addChild() or getChildren() failed.\n";
}

// Test setParent() and hasParent()
if ($b->hasParent()) {
    echo "Methods: setParent() and hasParent() passed.\n";
} else {
    echo "Methods: setParent() or hasParent() failed.\n";
}

// Test isParent()
if ($a->isParent() === sizeof($a->getChildren()) > 0) {
    echo "Method: isParent() passed.\n";
} else {
    echo "Method: isParent() failed.\n";
}

// Test getData()
if (strcmp($a->getData(), 'A') === 0) {
    echo "Method: getData() passed.\n";
} else {
    echo "Method: getData() failed.\n";
}

$b->addChild($c);
$c->addChild($d);
$d->addChild($e);
$e->addChild($f);

// Test getHeight()
if ($f->getHeight() === 1) {
    echo "Height test 1 passed!\n";
} else {
    echo "Height test 1 failed\n";
}

if ($e->getHeight() === 2) {
    echo "Height test 2 passed!\n";
} else {
    echo "Height test 2 failed\n";
}

if ($d->getHeight() === 3) {
    echo "Height test 3 passed!\n";
} else {
    echo "Height test 3 failed\n";
}

if ($c->getHeight() === 4) {
    echo "Height test 4 passed!\n";
} else {
    echo "Height test 4 failed\n";
}

if ($b->getHeight() === 5) {
    echo "Height test 5 passed!\n";
} else {
    echo "Height test 5 failed\n";
}

if ($a->getHeight() === 6) {
    echo "Height test 6 passed!\n";
} else {
    echo "Height test 6 failed\n";
}

echo $f->getHeight();

