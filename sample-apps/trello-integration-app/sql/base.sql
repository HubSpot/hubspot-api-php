create table if not exists `associations`
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    deal_id     VARCHAR(255) NOT NULL,
    card_id     VARCHAR(255) NOT NULL,
    created_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table if not exists `mappings`
(
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    board_id            VARCHAR(255) NOT NULL,
    board_list_id       VARCHAR(255) NOT NULL,
    pipeline_id         VARCHAR(255) NOT NULL,
    pipeline_stage_id   VARCHAR(255) NOT NULL,
    created_at          DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
