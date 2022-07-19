<?php

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render("Category");
    }

    public function render()
    {
        $this->data = array();
        $this->view->render("Category", $this->data);
    }   
}
