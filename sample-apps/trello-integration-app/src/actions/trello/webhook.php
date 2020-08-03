<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Deals\Model\SimplePublicObject;
use HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput;
use Repositories\AssociationRepository;
use Repositories\MappingsRepository;

$data = json_decode(file_get_contents('php://input'));

//handle only "list" change event
if (isset($data->action->data->listAfter)) {
    $boardListId = $data->action->data->listAfter->id;
    $cardId = $data->model->id;
    $associations = AssociationRepository::findByCardId($cardId);

    if (!empty($associations)) {
        $hubSpot = HubspotClientHelper::createFactory();

        foreach ($associations as $association) {
            $deal = $hubSpot->crm()->deals()->basicApi()->getById($association['deal_id']);
            if ($deal instanceof SimplePublicObject) {
                $mapping = MappingsRepository::findOneByBoardListIdAndPipelineId(
                    $boardListId,
                    $deal->getProperties()['pipeline']
                );

                if (!empty($mapping)) {
                    $request = new SimplePublicObjectInput();
                    $request->setProperties(['dealstage' => $mapping['pipeline_stage_id']]);

                    $hubSpot->crm()->deals()->basicApi()->update($deal->getId(), $request);
                }
            }
        }
    }
}
