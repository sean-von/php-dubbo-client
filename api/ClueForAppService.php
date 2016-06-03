<?php
require_once 'DubboInvoker.php';

/**
 * User: fengxiao
 * Date: 16/6/2
 */
class ClueForAppService extends DubboInvoker
{
    public function search($startTime, $endTime, $pageNo, $pageSize){
        return $this->getDubboClient() -> request($this->invoke(__FUNCTION__, func_get_args()));
    }

    public function saveClue($clueDTO){
        return $this->getDubboClient() -> request($this->invoke(__FUNCTION__, func_get_args()));
    }


    public function getPackagePath()
    {
        return "com.lianjia.crm.api.service";
    }

}