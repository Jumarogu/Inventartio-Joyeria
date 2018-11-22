DROP TABLE DesVentaj;
DROP TABLE proveej;
DROP TABLE piezaj;
DROP TABLE categoriaj;
DROP TABLE proveedorj;
DROP TABLE ventaj;
DROP TABLE clientej;

CREATE TABLE Clientej(
	idClientej NUMBER(10) CONSTRAINT cliente_pk PRIMARY KEY NOT NULL,
	nombreCliente VARCHAR(50), 
	direccion VARCHAR(80),
	email VARCHAR(80)
);

CREATE TABLE Categoriaj(
	idCategoria NUMBER(10) CONSTRAINT categoria_pk PRIMARY KEY NOT NULL,
	metal VARCHAR(25),
	kilataje INT,
	Nombre VARCHAR(25),
	PesoBruto NUMBER(5)
);

CREATE TABLE Piezaj(
	idPieza NUMBER(10) CONSTRAINT pieza_pk PRIMARY KEY NOT NULL,
	idCategoria NUMBER(10), 
	Joya VARCHAR(20),
	Cantidad INT,
	CONSTRAINT pieza_cate_fk 
	FOREIGN KEY(idCategoria) REFERENCES Categoriaj(idCategoria)
);

CREATE TABLE Proveedorj(
	idProveedor NUMBER(10) CONSTRAINT prov_pk PRIMARY KEY NULL,
	nombreProveedor VARCHAR(20),
	telefono Int
);

CREATE TABLE Ventaj(
	idVenta NUMBER(10) CONSTRAINT venta_pk PRIMARY KEY NOT NULL,
	fechaVenta DATE,
	metodoPago VARCHAR(20),
	precioTotal INT,
	idClientej NUMBER(10) 
	CONSTRAINT vent_cli_fk 
	REFERENCES Clientej(idClientej)
);

CREATE TABLE Proveej(
	fechaCompra Date,
	idCategoria NUMBER(10) NOT NULL,
	idProveedor NUMBER(10) NOT NULL,
	PesoCompra INT,
	TotalCompra INT,
	CONSTRAINT provee_pro_fk FOREIGN KEY(idProveedor) REFERENCES Proveedorj(idProveedor),
	CONSTRAINT provee_cat_fk FOREIGN KEY(idCategoria) REFERENCES Categoriaj(idCategoria),
	CONSTRAINT provee_pk 
	PRIMARY KEY(FechaCompra,idCategoria,idProveedor)
);

CREATE TABLE DesVentaj(
	idVenta NUMBER(10) NOT NULL,
	idPieza NUMBER(10) NOT NULL,
	vCantidad INT,
	CONSTRAINT Des_pk PRIMARY KEY(idPieza, idVenta),
	CONSTRAINT Des_Pie_fk FOREIGN KEY(idPieza) REFERENCES Piezaj(idPieza),
	CONSTRAINT Des_Ven_fk FOREIGN KEY(idVenta) REFERENCES Ventaj(idVenta)
);

/*
 *Trigger y secuencia para generar ID en Clientej
*/
DROP SEQUENCE id_cliente_seq;
CREATE SEQUENCE id_cliente_seq;

CREATE OR REPLACE TRIGGER id_cliente_gen
BEFORE INSERT ON clientej
FOR EACH ROW
BEGIN
	IF :new.idClientej IS NULL THEN
		SELECT id_cliente_seq.NEXTVAL
		INTO :new.idClientej
		FROM dual;
	END IF;
END;
/
INSERT INTO Clientej VALUES('0', 'Cliente Mostrador','','');
/*
 *Trigger y secuencia para generar ID en Proveedorj
*/
DROP SEQUENCE id_proveedor_seq;
CREATE SEQUENCE id_proveedor_seq;

CREATE OR REPLACE TRIGGER id_proveedor_gen
BEFORE INSERT ON proveedorj
FOR EACH ROW
BEGIN
	SELECT id_proveedor_seq.NEXTVAL
	INTO :new.idProveedor
	FROM dual;
END;
/ 

/*
 *Trigger y secuencia para generar ID en Categoríaj
*/
DROP SEQUENCE id_categoria_seq;
CREATE SEQUENCE id_categoria_seq;

CREATE OR REPLACE TRIGGER id_categoria_gen
BEFORE INSERT ON categoriaj
FOR EACH ROW
BEGIN
	SELECT id_categoria_seq.NEXTVAL
	INTO :new.idCategoria
	FROM dual;
END;
/

/*
 *Trigger y secuencia para generar ID en Piezaj
*/

DROP SEQUENCE id_pieza_seq;
CREATE SEQUENCE id_pieza_seq;

CREATE OR REPLACE TRIGGER id_pieza_gen
BEFORE INSERT ON piezaj
FOR EACH ROW
BEGIN
	SELECT id_pieza_seq.NEXTVAL
	INTO :new.idPieza
	FROM dual;
END;
/

/*
 *Trigger y secuencia para generar ID en Ventaj
*/

DROP SEQUENCE id_venta_seq;
CREATE SEQUENCE id_venta_seq;

CREATE OR REPLACE TRIGGER id_venta_gen
BEFORE INSERT ON ventaj
FOR EACH ROW
BEGIN
	SELECT id_venta_seq.NEXTVAL
	INTO :new.idVenta
	FROM dual;
END;
/
/*
 *Trigger para poner NA en Kilataje cuando no se agrega
*/

CREATE OR REPLACE TRIGGER kilataje_categoria
BEFORE INSERT ON categoriaj
FOR EACH ROW
DECLARE x NUMBER := 0;
BEGIN
	IF :new.kilataje IS NULL THEN
		SELECT x
		INTO :new.kilataje
		FROM dual;
	END IF;
END;
/

/*
 *Trigger para poner NA en Joya cuando no se agrega
*/

CREATE OR REPLACE TRIGGER pieza_insert
BEFORE INSERT ON piezaj
FOR EACH ROW
DECLARE x VARCHAR2(20) := 'SIN JOYA';
BEGIN
	IF :new.joya IS NULL THEN
		SELECT x
		INTO :new.joya
		FROM dual;
	END IF;
END;
/
UPDATE CLIENTEJ SET direccion = 'Mostrador', email = 'Mostrador@email.com' WHERE idClientej = '0';