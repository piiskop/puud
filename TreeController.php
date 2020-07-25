<?php
namespace trees;

class TreeController
{

    public function __construct($arguments)
    {
        require_once dirname(__FILE__) . '/Tree.php';
        $data = Tree::findAll();
        if (sizeof($data) > 0) {
            new \o\Response(array(
                'data' => $data,
                'message' => 'number of trees found:' . sizeof($data),
                'status' => 200
            ));
        } else {
            new \o\Response(array(
                'message' => 'no trees found',
                'status' => 204
            ));
        }
    }
}