<?php


class Dashboard extends Controller
{

    public function __construct()
    {
        
    }
    public function index()
    {
        $data = [];  //temporal porque no hay
        $this->renderView('dashboard/inicio', $data);
    }
}
