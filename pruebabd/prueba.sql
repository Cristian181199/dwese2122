DROP TABLE IF EXISTS depart CASCADE;

CREATE TABLE depart
(
    id           bigserial    PRIMARY KEY
  , denominacion varchar(255) NOT NULL
  , localidad    varchar(255)
);

INSERT INTO depart (denominacion, localidad)
    VALUES ('Contabilidad', 'Sanlúcar'),
           ('Informática', 'Jerez de la Frontera'),
           ('Inglés', 'Londres'),
           ('Matemáticas', 'Trebujena'),
           ('Cibernética', 'Chipiona');

DROP TABLE IF EXISTS emple CASCADE;

CREATE TABLE emple
(
    id        bigserial     PRIMARY KEY
  , nombre    varchar(255)  NOT NULL
  , fecha_alt timestamp
  , salario   numeric(6, 2)
  , depart_id bigint        NOT NULL REFERENCES depart (id)
);

DROP FUNCTION IF EXISTS preparar(text) CASCADE;

CREATE FUNCTION preparar(cadena text) RETURNS text
LANGUAGE plpgsql as $$
BEGIN
    RETURN translate(lower(cadena), 'áéíóú', 'aeiou');
END;$$;

INSERT INTO emple (nombre, fecha_alt, salario, depart_id)
    VALUES ('Manolo', '2019-12-04 17:00:00', 2340.75, 2)
         , ('Rosa', '2020-04-05 14:00:00', 2874.99, 4);

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
    id bigserial PRIMARY KEY
  , username varchar(255) NOT NULL UNIQUE
  , password varchar(255) NOT NULL
);

INSERT INTO usuarios (username, password)
VALUES ('admin', crypt('admin', gen_salt('bf', 10)));
