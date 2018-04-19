<?php
/**
 * Created by PhpStorm.
 * User: davidhamm
 * Date: 4/17/18
 * Time: 6:39 PM
 */

class Node
{

    // ATTRIBUTES
    private $data;
    private $parent;
    public $children = [];
    private $height = 0;



    public function __construct($data, $children = null, $parent = null)
    {
        $this->data = $data;
        if(isset($children)) {
            $this->children = $children;
        }
        if(isset($parent)) {
            $this->parent = $parent;
        }
    }

    /**
     * @return array of child elements if present
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * @param node object $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return object if parent node is present
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return mixed data assigned to the node
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Node object adding child to element
     */
    public function addChild($child) {
        array_push($this->children, $child);
        $child->setParent($this);
    }

    /**
     * @return boolean if node has a parent element
     */
    public function hasParent() {
        if ($this->parent != null) {
            return true;
        }
    }

    /**
     * @return boolean true if node has children
     */
    public function isParent() {
        //echo "Checking ancestry of " . $this->getData() . ". The number of children is : " . sizeof($this->children) . ".\n";
        if (sizeof($this->children) === 0) {
            //echo "false";
            return false;
        } else {
            //echo "true";
            return true;
        }
    }

    /**
     * @return int deepest branch from calling node
     */
    public function getlongestBranch() {
        if (!$this->isParent()) {
            return 0;
        }

        $heightArray = [];

        foreach($this->getChildren() as $child) {
            $heightArray[] = $child->getHeight();
        }
        return max($heightArray) + 1; // adds one to the returning call if a node was hit.
    }

    public function getHeight() {
        if ($this->isParent()) {
            return $this->getlongestBranch();
        }
        return 1 + $this->getlongestBranch();
    }



}

