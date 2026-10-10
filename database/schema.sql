-- =====================================================================
--  Proyecto : Cultura de Colombia
--  Motor    : SQLite 3
--  Archivo  : schema.sql  (estructura / DDL)
--  Uso      : php scripts/init_db.php   (o importar con sqlite3)
-- =====================================================================

PRAGMA foreign_keys = ON;

-- Limpieza (permite re-inicializar sin conflictos) --------------------
DROP TABLE IF EXISTS datos_curiosos;
DROP TABLE IF EXISTS mensajes;
DROP TABLE IF EXISTS sitios;
DROP TABLE IF EXISTS simbolos;
DROP TABLE IF EXISTS personajes;
DROP TABLE IF EXISTS festividades;
DROP TABLE IF EXISTS musica;
DROP TABLE IF EXISTS gastronomia;
DROP TABLE IF EXISTS regiones;

-- ---------------------------------------------------------------------
-- Regiones naturales / culturales de Colombia
-- ---------------------------------------------------------------------
CREATE TABLE regiones (
    id             INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre         TEXT    NOT NULL,
    slug           TEXT    NOT NULL UNIQUE,
    subtitulo      TEXT,
    descripcion    TEXT    NOT NULL,
    departamentos  TEXT,
    capital        TEXT,
    emoji          TEXT    DEFAULT '📍',
    color_ini      TEXT    DEFAULT '#003893',
    color_fin      TEXT    DEFAULT '#0b1f4b',
    orden          INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Gastronomía típica
-- ---------------------------------------------------------------------
CREATE TABLE gastronomia (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    region_id     INTEGER REFERENCES regiones(id) ON DELETE SET NULL,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    descripcion   TEXT    NOT NULL,
    ingredientes  TEXT,
    emoji         TEXT    DEFAULT '🍽️',
    color_ini     TEXT    DEFAULT '#f59e0b',
    color_fin     TEXT    DEFAULT '#ce1126',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Música y ritmos
-- ---------------------------------------------------------------------
CREATE TABLE musica (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    region_id     INTEGER REFERENCES regiones(id) ON DELETE SET NULL,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    descripcion   TEXT    NOT NULL,
    instrumentos  TEXT,
    emoji         TEXT    DEFAULT '🎵',
    color_ini     TEXT    DEFAULT '#003893',
    color_fin     TEXT    DEFAULT '#ce1126',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Festividades y carnavales
-- ---------------------------------------------------------------------
CREATE TABLE festividades (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    region_id     INTEGER REFERENCES regiones(id) ON DELETE SET NULL,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    descripcion   TEXT    NOT NULL,
    ciudad        TEXT,
    mes           TEXT,
    es_patrimonio INTEGER DEFAULT 0,
    emoji         TEXT    DEFAULT '🎉',
    color_ini     TEXT    DEFAULT '#003893',
    color_fin     TEXT    DEFAULT '#ce1126',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Personajes destacados
-- ---------------------------------------------------------------------
CREATE TABLE personajes (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    profesion     TEXT,
    descripcion   TEXT    NOT NULL,
    nacimiento    INTEGER,
    fallecimiento INTEGER,
    emoji         TEXT    DEFAULT '⭐',
    color_ini     TEXT    DEFAULT '#003893',
    color_fin     TEXT    DEFAULT '#ce1126',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Símbolos patrios y naturales
-- ---------------------------------------------------------------------
CREATE TABLE simbolos (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    categoria     TEXT,
    descripcion   TEXT    NOT NULL,
    emoji         TEXT    DEFAULT '🎖️',
    color_ini     TEXT    DEFAULT '#003893',
    color_fin     TEXT    DEFAULT '#ce1126',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Sitios y destinos turísticos
-- ---------------------------------------------------------------------
CREATE TABLE sitios (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    region_id     INTEGER REFERENCES regiones(id) ON DELETE SET NULL,
    nombre        TEXT    NOT NULL,
    slug          TEXT    NOT NULL UNIQUE,
    categoria     TEXT,
    ciudad        TEXT,
    descripcion   TEXT    NOT NULL,
    emoji         TEXT    DEFAULT '🏞️',
    color_ini     TEXT    DEFAULT '#003893',
    color_fin     TEXT    DEFAULT '#0b1f4b',
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Datos curiosos / cifras
-- ---------------------------------------------------------------------
CREATE TABLE datos_curiosos (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    icono         TEXT    DEFAULT '📊',
    valor         TEXT    NOT NULL,
    titulo        TEXT    NOT NULL,
    descripcion   TEXT,
    orden         INTEGER DEFAULT 0
);

-- ---------------------------------------------------------------------
-- Mensajes del formulario de contacto
-- ---------------------------------------------------------------------
CREATE TABLE mensajes (
    id         INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre     TEXT    NOT NULL,
    email      TEXT    NOT NULL,
    asunto     TEXT,
    mensaje    TEXT    NOT NULL,
    creado_en  TEXT    DEFAULT (datetime('now','localtime')),
    ip         TEXT
);

-- Índices de apoyo ----------------------------------------------------
CREATE INDEX idx_gastronomia_region ON gastronomia(region_id);
CREATE INDEX idx_musica_region      ON musica(region_id);
CREATE INDEX idx_festividades_region ON festividades(region_id);
CREATE INDEX idx_sitios_region      ON sitios(region_id);
