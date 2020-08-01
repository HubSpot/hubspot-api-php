create table if not exists card_webhooks
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    webhook_id  VARCHAR(255) NOT NULL,
    card_id     VARCHAR(255) NOT NULL,
    UNIQUE (card_id)
);