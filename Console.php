<?php
use com\lianjia\crm\api\service\ClueForAppInputDTO;
use com\lianjia\crm\api\service\ClueForAppService;

require_once __DIR__ . '/api/ClueForAppService.php';
require_once __DIR__ . '/model/ClueForAppInputDTO.php';


$clueForAppService = new ClueForAppService();

//example 1, search method
$value = $clueForAppService->search('2016-05-02', '2016-05-23', 1, 3) . "\n";
echo $value;

//example 2, invoke remote save method
$clueDto = new ClueForAppInputDTO();
$clueDto->cityId = '320100';
$clueDto->ownerId = '2000000005344467';
$clueDto->source = '103';
$clueDto->houseId = '1215051924452';
$clueDto->resBlockId = '1111046327215';
$clueDto->price = '2200000.00';
$result = $clueForAppService->saveClue($clueDto);
echo $result;
