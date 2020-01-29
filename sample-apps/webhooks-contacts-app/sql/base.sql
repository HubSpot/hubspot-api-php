create table if not exists events
(
    id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    event_type      VARCHAR(255),
    object_id       int             default null,
    event_id        bigint          default null,
    occurred_at     bigint          default null,
    propertyName    varchar(255)    default null,
    propertyValue   varchar(255)    default null,
    created_at      datetime        default CURRENT_TIMESTAMP
);
