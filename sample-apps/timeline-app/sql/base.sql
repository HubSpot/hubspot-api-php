create table if not exists `telegram_update`
(
    `id` bigint UNSIGNED COMMENT 'Update''s unique identifier'
);

create table user
(
    telegram_chat_id int not null,
    email varchar(255) default null null,
    constraint users_pk
        primary key (telegram_chat_id)
);

create table if not exists event_types
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    code        VARCHAR(255) unique not null,
    hubspot_event_type_id bigint unique not null
);

create table if not exists invitations
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255) not null,
    text        text not null,
    event_url   VARCHAR(255) not null,
    created_at  DATETIME not null DEFAULT CURRENT_TIMESTAMP
);

create table if not exists tokens
(
    id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    refresh_token VARCHAR(255) not null,
    access_token VARCHAR(255) not null,
    expires_at bigint not null,
    expires_in int not null
);

insert into invitations (name, text, event_url) values ('Test event', 'Our company would like to invite you to our Test Event! We will be glad to see you. Will you come?', 'https://hubspot.com');

