<?php
require_once __DIR__ . '/../util/DubboClient.php';

/**
 * User: fengxiao
 * Date: 16/6/2
 */
abstract class DubboInvoker
{
    const prefix = "invoke";

    private $remote_address;
    private $remote_port;

    /**
     * @param mixed $remote_address
     */
    public function setRemoteAddress($remote_address)
    {
        $this->remote_address = $remote_address;
    }

    /**
     * @param mixed $remote_port
     */
    public function setRemotePort($remote_port)
    {
        $this->remote_port = $remote_port;
    }

    protected abstract function config();

    protected function getDubboClient()
    {
        $this->config();
        if (empty($this->remote_address)) {
            throw new Exception("remote address not config yet");
        }
        if (empty($this->remote_port)) {
            throw new Exception("remote port not config yet");
        }
        return new DubboClient($this->remote_address, $this->remote_port);
    }

    /**
     * 拼接 Dubbo 调用命令
     */
    public function invoke($invokeMethod, $array)
    {
        $service = str_replace('\\', '.', get_class($this)) . '.' . $invokeMethod;
        $service .= '(';
        for ($i = 0; $i < count($array); $i++) {
            $service .= json_encode($array[$i]) . ($i === count($array) - 1 ? '' : ',');
        }
        $service .= ')';
        return self::prefix . ' ' . $service . "\n";
    }


}