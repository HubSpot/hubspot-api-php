create table if not exists `settings`
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(250) NOT NULL,
    data        text NOT NULL,
    created_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (name)
);
