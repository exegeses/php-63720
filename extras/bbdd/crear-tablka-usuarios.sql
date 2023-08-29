# Creación de tabla roles
create table roles
(
    idRol tinyint unsigned primary key auto_increment not null,
    rol varchar(45) unique not null
);

-- inserción de datos en tabla roles
insert into roles
    VALUES
        (1, 'Administrador'),
        (2, 'Supervisor'),
        (3, 'Empleado'),
        (4, 'Invitado');


# Creación de tabla de usuarios

create table usuarios
(
    idUsuario tinyint unsigned auto_increment primary key not null,
    usuNombre varchar(100) not null,
    usuApellido varchar(100) not null,
    usuEmail varchar(100) unique not null,
    usuClave varchar(72) not null,
    idRol tinyint unsigned not null default (3),
        foreign key (idRol) references roles (idRol),
    usuActivo boolean default (1)
);



