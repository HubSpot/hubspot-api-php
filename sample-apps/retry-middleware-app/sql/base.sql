create table if not exists tokens
(
    id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    refresh_token   VARCHAR(255) not null,
    access_token    VARCHAR(255) not null,
    expires_at      bigint not null,
    expires_in      int not null
);
