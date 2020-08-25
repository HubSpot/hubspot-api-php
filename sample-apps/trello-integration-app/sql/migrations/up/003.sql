ALTER TABLE `mappings` ADD UNIQUE KEY board_id_pipeline_id_board_list_id (board_id, pipeline_id, board_list_id);

ALTER TABLE `mappings` ADD UNIQUE KEY board_id_pipeline_id_pipeline_stage_id (board_id, pipeline_id, pipeline_stage_id);
