<?php

/**
 * User: fengxiao
 * Date: 16/6/3
 */
class DubboClient
{
    private $service_port;
    private $address;

    /**
     * DubboClient constructor.
     */
    public function __construct($address, $service_port)
    {
        $this -> address = $address;
        $this -> service_port = $service_port;
    }


    /**
     * Create a TCP/IP socket
     */
    private function getSocket(){
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        } else {
            /*echo "OK.\n";*/
        }
        return $socket;
    }

    /**
     * connect to remote port
     */
    private function connect($socket){
        $result = socket_connect($socket, $this -> address, $this -> service_port);
        if ($result === false) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        } else {
            /*echo "OK. connect \n";*/
        }
    }

    public function request($param){
        /*echo "param is :" . $param;*/
        $socket = $this -> getSocket();
        $this -> connect($socket);

        socket_write($socket, $param, strlen($param));

        $result = "";
        while ($out = socket_read($socket, 1024)) {
            $result .= $out;

            if(preg_match("/.*dubbo>$/", $result)){
                break;
            }
        }
        /*echo $result;*/

        socket_close($socket);
        return substr($result, 0, strrpos($result,'}')+1);
    }

}