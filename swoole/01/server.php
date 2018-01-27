<?php 
// async to handle request.
class Server {

    private $serv; 

    public function __construct() {
        $this->serv = new swoole_server('', 9501); 
        $this->serv->set([
            'worker_num' => 8,
            'daemnonize' => false,
            'max_request' => 10000,
            'dispatch_mode' => 2, 
            'debug_mode' => 1
                ]);

        $this->serv->on('Start', [$this, 'onStart']);
        $this->serv->on('Connect', [$this, 'onConnect']);
        $this->serv->on('Receive', [$this, 'onReceive']);
        $this->serv->on('Close', [$this, 'onClose']);

        $this->serv->start();
    }

    public function onStart() {
        echo 'start\n';    
    }

    public function onConnect() {
        echo 'connect\n';    
    }

    public function onReceive() {
        echo 'receive\n';    
    }

    public function onClose() {
        echo 'close\n';    
    }

}

$server = new Server();
