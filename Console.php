<?php
require_once __DIR__ . '/api/ClueForAppService.php';
require_once __DIR__ . '/model/ClueForAppInputDTO.php';
/**
 * User: fengxiao
 * Date: 16/6/3
 */

$clueForAppService = new ClueForAppService();

$value = $clueForAppService->search('2016-05-02', '2016-05-03', 1, 3) . "\n";
echo $value;

$clueDto = new ClueForAppInputDTO();
$clueDto->cityId = '320100';
$clueDto->ownerId = '2000000005344467';
$clueDto->source = '103';
$clueDto->houseId = '1215051924452';
$clueDto->resBlockId = '1111046327215';
$clueDto->price = '2200000.00';

$result = $clueForAppService->saveClue($clueDto);
echo $result;