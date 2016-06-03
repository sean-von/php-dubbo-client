<?php
require_once __DIR__ . '/../util/DubboClient.php';

/**
 * User: fengxiao
 * Date: 16/6/2
 */
abstract class DubboInvoker
{
    const prefix = "invoke";

    public abstract function getPackagePath();
    
    public function invoke($invokeMethod, $array)
    {
        $service = $this->getPackagePath() . '.' . get_class($this) . '.' . $invokeMethod;
        $service .= '(';
        for ($i = 0; $i < count($array); $i++) {
            $service .= json_encode($array[$i]) . ($i === count($array) - 1 ? '' : ',');
        }
        $service .= ')';
        return self::prefix . ' ' . $service . "\n";
    }

    public function getDubboClient()
    {
        return new DubboClient('127.0.0.1', '20889');
    }

}