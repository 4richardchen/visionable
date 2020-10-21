<?php

$db = new SQLite3('/app/visionable.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

// create clinics table
$db->query(
'CREATE TABLE IF NOT EXISTS "clinics" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" VARCHAR
  )'
);

// insert sample clinic data
$db->query('INSERT INTO "clinics" ("name") VALUES ("Alpha")');
$db->query('INSERT INTO "clinics" ("name") VALUES ("Beta")');
$db->query('INSERT INTO "clinics" ("name") VALUES ("Charlie")');
$db->query('INSERT INTO "clinics" ("name") VALUES ("Delta")');
$db->query('INSERT INTO "clinics" ("name") VALUES ("Echo")');

// create clinics table
$db->query(
'CREATE TABLE IF NOT EXISTS "appointments" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" VARCHAR,
    "clinic_id" INTEGER,
    "start_time" INTEGER,
    "duration" INTEGER, 
    FOREIGN KEY(clinic_id) REFERENCES clinics(id)
  )'
);

// insert sample appointments data
$db->query('INSERT INTO "appointments" ("name", "clinic_id", "start_time", "duration") VALUES ("Kickoff", 1, 2400730, 2400)');
//@todo: add CHECK to stop overlapping appointments

?>
