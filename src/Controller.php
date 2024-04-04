<?php

class Controller {

    protected $dbc;
    protected $warenkorb;
    protected $userModel;

    public function __construct(PDO $dbc)
    {
        $this->dbc = $dbc;
        $this->warenkorb = new Warenkorb();
        $this->userModel = new UserModel($dbc);
    }

    public function runView($view, $data = null) {
        $layout = new Layout();
        $data === null ? $layout->view($view) : $layout->view($view, $data);
    }

    public function runAction(string $action, array $params = []) 
    {
        $action = $action  . 'Action';
        if(method_exists($this, $action)) {
            if(count($params) > 0) {
                $this->$action($params);
            } else {
                $this->$action();
            }
        }
    }
}


