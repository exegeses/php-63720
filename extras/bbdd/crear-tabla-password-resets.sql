### tabla password_resets

CREATE TABLE password_resets
(
    id tinyint unsigned auto_increment primary key,
    codigo varchar(6) not null,
    usuEmail varchar(100) not null,
    fecha timestamp not null default( current_timestamp() ),
    activo boolean not null default(1)
);