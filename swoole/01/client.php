<?php 

class Client {

    private $client;

    public function __construct(0 {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP);
    }

    public function connect() {
        if (!$this->client->connect('127.0.0.1', 9501, 1)) {
            echo "error: {$fp->errMsg} [{$fp->errCode}]\n";
        }

        $message = $this->client->recv();
        echo "get msg from server:{$message}\n";

        fwrite(STDOUT, 'input msg:');
        $msg = trim(fgets(STDIN));
        $this->client->send($msg);
    
    }

    public function test() {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP); 

    }

}

$client = new Client();
$client->connect();
