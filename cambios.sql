use shein;
select * from compras;
alter table compras add column fecha DATE NULL DEFAULT NULL;
alter table compras add column hora TIME NULL DEFAULT NULL;