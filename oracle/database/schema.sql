DROP TABLE CLECK_USER CASCADE CONSTRAINTS;

DROP TABLE CART_PRODUCT CASCADE CONSTRAINTS;

DROP TABLE PRODUCT CASCADE CONSTRAINTS;

DROP TABLE PROD_ORDER CASCADE CONSTRAINTS;

DROP TABLE SHOP CASCADE CONSTRAINTS;

DROP TABLE COLLECTION_SLOT CASCADE CONSTRAINTS;

DROP TABLE WISHLIST_PRODUCT CASCADE CONSTRAINTS;

DROP TABLE PAYMENT CASCADE CONSTRAINTS;

DROP TABLE REVIEW CASCADE CONSTRAINTS;

DROP TABLE ORDER_DETAILS CASCADE CONSTRAINTS;

DROP TABLE PRODUCT_CATEGORY CASCADE CONSTRAINTS;

DROP TABLE DISCOUNT CASCADE CONSTRAINTS;

DROP TABLE REPORT CASCADE CONSTRAINTS;




DROP SEQUENCE shop_id_s;
DROP SEQUENCE product_id_s;
DROP SEQUENCE product_category_id_s;
DROP SEQUENCE product_cart_id_s;
DROP SEQUENCE wishlist_product_id_s;
DROP SEQUENCE user_id_s;
DROP SEQUENCE prod_order_s; 
DROP SEQUENCE payment_id_s;
DROP SEQUENCE order_detail_s;
DROP SEQUENCE review_s;
DROP SEQUENCE discount_s;
DROP SEQUENCE order_id_s;
DROP SEQUENCE order_detail_id_s;
DROP SEQUENCE review_id_s;






-- Create a Database table to represent the "CLECK_USER" entity.
CREATE TABLE CLECK_USER(
	user_id	INTEGER NOT NULL,
	user_fullname	VARCHAR(100),
	user_name VARCHAR2(50),
	password	VARCHAR(100),
	email	VARCHAR(100),
	contact	VARCHAR(100),

	user_role	VARCHAR(20),
	birthdate	date,
	active_status	VARCHAR(100),
    token	VARCHAR(100),
	user_image	varchar2(255),
	-- Specify the PRIMARY KEY constraint for table "CLECK_USER".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_CLECK_USER PRIMARY KEY (user_id)
);

-- Create a Database table to represent the "CART_PRODUCT" entity.
CREATE TABLE CART_PRODUCT(
	cart_product_id	INTEGER NOT NULL,
	product_quantity	INTEGER,
    purchase integer,
	fk1_product_id	INTEGER NOT NULL,
	fk2_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "CART_PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_CART_PRODUCT PRIMARY KEY (cart_product_id)
);

-- Create a Database table to represent the "PRODUCT" entity.
CREATE TABLE PRODUCT(
	product_id	INTEGER NOT NULL,
	producy_name	VARCHAR(255),
	product_description	VARCHAR(255),
	product_image	varchar2(255),
	product_stock	INTEGER,
	product_price	INTEGER,
	offer_price	INTEGER,
	product_status	VARCHAR(255),
	product_allergy_info	LONG VARCHAR,
	product_portion	VARCHAR(255),
	minimum_order	INTEGER,
	maximum_order	INTEGER,
    added_date date,
	fk1_shop_id	INTEGER NOT NULL,
	fk2_product_category_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PRODUCT PRIMARY KEY (product_id)
);

-- Create a Database table to represent the "PROD_ORDER" entity.
CREATE TABLE PROD_ORDER(
	order_id	INTEGER NOT NULL,
	order_date	DATE,
	order_status	VARCHAR(255),
	fk1_cart_product_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk1_cart_product_id),
	fk2_collectionslot_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "PROD_ORDER".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PROD_ORDER PRIMARY KEY (order_id)
);

-- Create a Database table to represent the "SHOP" entity.
CREATE TABLE SHOP(
	shop_id	INTEGER NOT NULL,
	shop_name	VARCHAR(255),
	shop_location	VARCHAR(255),
	shop_registration_no	INTEGER,
    status VARCHAR2(255),
	fk1_user_id	INTEGER NOT NULL,
    logo varchar2(255),
	-- Specify the PRIMARY KEY constraint for table "SHOP".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_SHOP PRIMARY KEY (shop_id)
);

-- Create a Database table to represent the "COLLECTION_SLOT" entity.
CREATE TABLE COLLECTION_SLOT(
	collectionslot_id	INTEGER NOT NULL,
	collection_day	VARCHAR(255),
	slot_location	VARCHAR(255),
	collection_time	VARCHAR(255),
	-- Specify the PRIMARY KEY constraint for table "COLLECTION_SLOT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_COLLECTION_SLOT PRIMARY KEY (collectionslot_id)
);


-- Create a Database table to represent the "WISHLIST_PRODUCT" entity.
CREATE TABLE WISHLIST_PRODUCT(
	wishlist_product_id	INTEGER NOT NULL,
	fk1_product_id	INTEGER NOT NULL,
	fk2_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "WISHLIST_PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_WISHLIST_PRODUCT PRIMARY KEY (wishlist_product_id)
);

-- Create a Database table to represent the "PAYMENT" entity.
CREATE TABLE PAYMENT(
	payment_id	INTEGER NOT NULL,
	payment_amount	INTEGER,
	payment_date	DATE,
	payment_method	VARCHAR(255),
	fk1_order_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk1_order_id),
	fk2_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "PAYMENT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PAYMENT PRIMARY KEY (payment_id)
);

-- Create a Database table to represent the "REVIEW" entity.
CREATE TABLE REVIEW(
	Review_id	INTEGER NOT NULL,
	review_comment	LONG VARCHAR,
	review_rating	INTEGER,
	review_date	DATE,
	fk1_product_id	INTEGER NOT NULL,
	fk2_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "REVIEW".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_REVIEW PRIMARY KEY (Review_id)
);

-- Create a Database table to represent the "ORDER_DETAILS" entity.
CREATE TABLE ORDER_DETAILS(
	order_detail_id	INTEGER NOT NULL,
	product_quantity	INTEGER,
	fk1_order_id	INTEGER NOT NULL,
	fk2_product_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "ORDER_DETAILS".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_ORDER_DETAILS PRIMARY KEY (order_detail_id)
);

-- Create a Database table to represent the "PRODUCT_CATEGORY" entity.
CREATE TABLE PRODUCT_CATEGORY(
	product_category_id	INTEGER NOT NULL,
	category_name	VARCHAR2(255),
	-- Specify the PRIMARY KEY constraint for table "PRODUCT_CATEGORY".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PRODUCT_CATEGORY PRIMARY KEY (product_category_id)
);

-- Create a Database table to represent the "DISCOUNT" entity.
CREATE TABLE DISCOUNT(
	discount_id	INTEGER NOT NULL,
	discount_percent	INTEGER,
	fk1_product_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk1_product_id),
	-- Specify the PRIMARY KEY constraint for table "DISCOUNT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_DISCOUNT PRIMARY KEY (discount_id)
);

-- Create a Database table to represent the "REPORT" entity.
CREATE TABLE REPORT(
	report_id	INTEGER NOT NULL,
	report_details	VARCHAR(255),
	fk1_user_id	INTEGER NOT NULL,
	fk2_product_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "REPORT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_REPORT PRIMARY KEY (report_id)
);


--------------------------------------------------------------
-- Alter Tables to add fk constraints --

-- Now all the tables have been created the ALTER TABLE command is used to define some additional
-- constraints.  These typically constrain values of foreign keys to be associated in some way
-- with the primary keys of related tables.  Foreign key constraints can actually be specified
-- when each table is created, but doing so can lead to dependency problems within the script
-- i.e. tables may be referenced before they have been created.  This method is therefore safer.

-- Alter table to add new constraints required to implement the "PROD_ORDER_CART_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "PROD_ORDER"
-- correctly references the primary key of table "CART_PRODUCT"

ALTER TABLE PROD_ORDER ADD CONSTRAINT fk1_ORDER_CART_PRODUCT FOREIGN KEY(fk1_cart_product_id) REFERENCES CART_PRODUCT(cart_product_id) ;

-- Alter table to add new constraints required to implement the "WISHLIST_PRODUCT_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "WISHLIST_PRODUCT"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE WISHLIST_PRODUCT ADD CONSTRAINT fk1_WISHLIST_PRODUCT_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id) ;

-- Alter table to add new constraints required to implement the "PRODUCT_SHOP" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "SHOP"

ALTER TABLE PRODUCT ADD CONSTRAINT fk1_PRODUCT_SHOP FOREIGN KEY(fk1_shop_id) REFERENCES SHOP(shop_id) ;

-- Alter table to add new constraints required to implement the "CART_PRODUCT_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "CART_PRODUCT"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE CART_PRODUCT ADD CONSTRAINT fk1_CART_PRODUCT_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id) ;

-- Alter table to add new constraints required to implement the "PROD_ORDER_COLLECTION_SLOT" relationship

-- This constraint ensures that the foreign key of table "PROD_ORDER"
-- correctly references the primary key of table "COLLECTION_SLOT"

ALTER TABLE PROD_ORDER ADD CONSTRAINT fk2_PROD_ORDER_COLLECTION_SLOT FOREIGN KEY(fk2_collectionslot_id) REFERENCES COLLECTION_SLOT(collectionslot_id) ;

-- Alter table to add new constraints required to implement the "REVIEW_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "REVIEW"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE REVIEW ADD CONSTRAINT fk1_REVIEW_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id) ;

-- Alter table to add new constraints required to implement the "PAYMENT_PROD_ORDER" relationship

-- This constraint ensures that the foreign key of table "PAYMENT"
-- correctly references the primary key of table "PROD_ORDER"

ALTER TABLE PAYMENT ADD CONSTRAINT fk1_PAYMENT_PROD_ORDER FOREIGN KEY(fk1_order_id) REFERENCES PROD_ORDER(order_id) ;

-- Alter table to add new constraints required to implement the "ORDER_DETAILS_PROD_ORDER" relationship

-- This constraint ensures that the foreign key of table "ORDER_DETAILS"
-- correctly references the primary key of table "PROD_ORDER"

ALTER TABLE ORDER_DETAILS ADD CONSTRAINT fk1_ORDER_DETAILS_PROD_ORDER FOREIGN KEY(fk1_order_id) REFERENCES PROD_ORDER(order_id) ;

-- Alter table to add new constraints required to implement the "ORDER_DETAILS_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "ORDER_DETAILS"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE ORDER_DETAILS ADD CONSTRAINT fk2_ORDER_DETAILS_PRODUCT FOREIGN KEY(fk2_product_id) REFERENCES PRODUCT(product_id) ;

-- Alter table to add new constraints required to implement the "SHOP_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "SHOP"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE SHOP ADD CONSTRAINT fk1_SHOP_CLECK_USER FOREIGN KEY(fk1_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "REVIEW_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "REVIEW"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE REVIEW ADD CONSTRAINT fk2_REVIEW_CLECK_USER FOREIGN KEY(fk2_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "WISHLIST_PRODUCT_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "WISHLIST_PRODUCT"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE WISHLIST_PRODUCT ADD CONSTRAINT fk2_WISHLIST_PRODUCT_USER FOREIGN KEY(fk2_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "CART_PRODUCT_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "CART_PRODUCT"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE CART_PRODUCT ADD CONSTRAINT fk2_CART_PRODUCT_CLECK_USER FOREIGN KEY(fk2_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "PAYMENT_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "PAYMENT"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE PAYMENT ADD CONSTRAINT fk2_PAYMENT_CLECK_USER FOREIGN KEY(fk2_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "PRODUCT_PRODUCT_CATEGORY" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "PRODUCT_CATEGORY"

ALTER TABLE PRODUCT ADD CONSTRAINT fk2_PRODUCT_tPRODUCT_CATEGORY FOREIGN KEY(fk2_product_category_id) REFERENCES PRODUCT_CATEGORY(product_category_id) ;

-- Alter table to add new constraints required to implement the "DISCOUNT_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "DISCOUNT"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE DISCOUNT ADD CONSTRAINT fk1_DISCOUNT_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id) ;

-- Alter table to add new constraints required to implement the "REPORT_CLECK_USER" relationship

-- This constraint ensures that the foreign key of table "REPORT"
-- correctly references the primary key of table "CLECK_USER"

ALTER TABLE REPORT ADD CONSTRAINT fk1_REPORT_CLECK_USER FOREIGN KEY(fk1_user_id) REFERENCES CLECK_USER(user_id) ;

-- Alter table to add new constraints required to implement the "REPORT_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "REPORT"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE REPORT ADD CONSTRAINT fk2_REPORT_PRODUCT FOREIGN KEY(fk2_product_id) REFERENCES PRODUCT(product_id) ;


--------------------------------------------------------------
-- End of DDL file auto-generation
--------------------------------------------------------------




--------------------------------------------------------------
-- Creation of Sequences
--------------------------------------------------------------


CREATE SEQUENCE shop_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE product_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE product_category_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE product_cart_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE wishlist_product_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE user_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;



CREATE SEQUENCE prod_order_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE payment_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE order_detail_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE review_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE discount_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE order_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;


CREATE SEQUENCE order_detail_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;

CREATE SEQUENCE review_id_s
start with 1
increment by 1
minvalue 0
maxvalue 9999999999999999999999999999 
cycle;






--------------------------------------------------------------
-- Creation of Triggers
--------------------------------------------------------------
CREATE OR REPLACE  TRIGGER  "TRIG_USER_ID" 
BEFORE INSERT
ON cleck_user
FOR EACH ROW
BEGIN
if :new.user_id is NULL then
SELECT user_id_s.NEXTVAL INTO :NEW.user_id FROM SYS.DUAL; 
end if;
end TRIG_USER_ID;
/




CREATE OR REPLACE  TRIGGER  "TRIG_SHOP_ID" 
BEFORE INSERT
ON shop
FOR EACH ROW
BEGIN
if :new.shop_id is NULL then
SELECT shop_id_s.NEXTVAL INTO :NEW.shop_id FROM SYS.DUAL; 
end if;
end TRIG_SHOP_ID;
/



CREATE OR REPLACE  TRIGGER  "TRIG_PPRODUCT_ID" 
BEFORE INSERT
ON product
FOR EACH ROW
BEGIN
if :new.product_id is NULL then
SELECT product_id_s.NEXTVAL INTO :NEW.product_id FROM SYS.DUAL; 
end if;
end TRIG_PPRODUCT_ID;
/


CREATE OR REPLACE  TRIGGER  "TRIG_CART_ID" 
BEFORE INSERT
ON CART_PRODUCT
FOR EACH ROW
BEGIN
if :new.cart_product_id is NULL then
SELECT product_cart_id_s.NEXTVAL INTO :NEW.cart_product_id FROM SYS.DUAL; 
end if;
end TRIG_CART_ID;
/

CREATE OR REPLACE  TRIGGER  "TRIG_WISHLIST_ID" 
BEFORE INSERT
ON WISHLIST_PRODUCT
FOR EACH ROW
BEGIN
if :new.wishlist_product_id is NULL then
SELECT wishlist_product_id_s.NEXTVAL INTO :NEW.wishlist_product_id FROM SYS.DUAL; 
end if;
end TRIG_WISHLIST_ID;
/


CREATE OR REPLACE  TRIGGER  "TRIG_ORDER_ID" 
BEFORE INSERT
ON PROD_ORDER
FOR EACH ROW
BEGIN
if :new.order_id is NULL then
SELECT order_id_s.NEXTVAL INTO :NEW.order_id FROM SYS.DUAL; 
end if;
end TRIG_ORDER_ID;
/


CREATE OR REPLACE  TRIGGER  "TRIG_ORDER_DETAIL_ID" 
BEFORE INSERT
ON ORDER_DETAILS
FOR EACH ROW
BEGIN
if :new.order_detail_id is NULL then
SELECT order_detail_id_s.NEXTVAL INTO :NEW.order_detail_id FROM SYS.DUAL; 
end if;
end TRIG_ORDER_DETAIL_ID;
/


CREATE OR REPLACE  TRIGGER  "TRIG_PAYMENT_ID" 
BEFORE INSERT
ON PAYMENT
FOR EACH ROW
BEGIN
if :new.payment_id	 is NULL then
SELECT payment_id_s.NEXTVAL INTO :NEW.payment_id FROM SYS.DUAL; 
end if;
end TRIG_PAYMENT_ID;
/

CREATE OR REPLACE  TRIGGER  "TRIG_review_ID" 
BEFORE INSERT
ON review
FOR EACH ROW
BEGIN
if :new.REVIEW_ID is NULL then
SELECT review_id_s.NEXTVAL INTO :NEW.REVIEW_ID FROM SYS.DUAL; 
end if;
end TRIG_review_ID;
/

CREATE OR REPLACE  TRIGGER  "TRIG_USER_ID" 
BEFORE INSERT
ON cleck_user
FOR EACH ROW
BEGIN
if :new.user_id is NULL then
SELECT user_id_s.NEXTVAL INTO :NEW.user_id FROM SYS.DUAL; 
end if;
end TRIG_USER_ID;
/

--------------------------------------------------------------
-- Insertion of Data
--------------------------------------------------------------



INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Inej Ghafa', 'cnancy21@tbc.edu.np', '9549914c64ebe30e14521c60e2310e5c', 'cnancy21@tbc.edu.np', '9823227343', 'C', '05/03/2001', '1', '', '123.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Kaz Brekker', 'gurungbharatt@gmail.com', 'ff99d470ee8b6b2f9f28fcf780fc720c', 'gurungbharatt@gmail.com', '9841776177', 'C', '02/01/2001', '1', '', '234.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Nina Zenik', 'nancycollum796@gmail.com', 'cc25004604219a158f10458b4f7610f4', 'nancycollum796@gmail.com', '9869062937', 'T', '04/03/1999', '1', '', '345.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Victor Vale', 'victorvale@gmail.com', '17a821dfa961c93a6c586ca257750fb2', 'kookyeonsoos@gmail.com', '9806908295', 'T', '06/01/1998', '1', '', '456.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Eli Cardale', 'xazil.maharjan@gmail.com', 'd319c74005abe790693e3e43783d3139', 'xazil.maharjan@gmail.com', '9988776655', 'T', '07/06/2001', '1', '', '567.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Dorian Gray', 'shifanyashrestha2@gmail.com', '41cdd1cc6ffa23d9f402010f2312a203', 'shifanyashrestha2@gmail.com', '8899002233', 'T', '07/12/1997', '1', '', '678.jpg');
INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Nancy Collum', 'nancycollum@gmail.com', '4e459e9dc2788b5ec6c7496ec3b57f8d', 'niania.andrea8@gmail.com', '3344556677', 'A', '03/29/2001', '1', '', '789.jpg');


INSERT INTO cleck_user(USER_ID, USER_FULLNAME, USER_NAME, PASSWORD, EMAIL, CONTACT, USER_ROLE, BIRTHDATE, ACTIVE_STATUS, TOKEN, USER_IMAGE) VALUES (user_id_s.NEXTVAL, 'Shifanya Shrestha', 'shifanyashrestha@gmail.com', 'b3c6f44336edb2a8ee570436e34d8b14', 'shifanyashrestha@gmail.com', '1100224488', 'T', '07/12/2001', '1', '', '789.jpg');


INSERT INTO SHOP(SHOP_ID, SHOP_NAME, SHOP_LOCATION, SHOP_REGISTRATION_NO, STATUS, FK1_USER_ID, LOGO) VALUES(shop_id_s.NEXTVAL, 'Bubbles Bakery Shop', 'Calderdale', '123456', '1', '3', 'trader-logo-1.png');
INSERT INTO SHOP(SHOP_ID, SHOP_NAME, SHOP_LOCATION, SHOP_REGISTRATION_NO, STATUS, FK1_USER_ID, LOGO) VALUES(shop_id_s.NEXTVAL, 'The Local Butcher Shop', 'Bradford', '234567', '1', '4', 'trader-logo-1.png');
INSERT INTO SHOP(SHOP_ID, SHOP_NAME, SHOP_LOCATION, SHOP_REGISTRATION_NO, STATUS, FK1_USER_ID, LOGO) VALUES(shop_id_s.NEXTVAL, 'Local Garden Fruits', 'Tadford', '345678', '1', '4', 'trader-logo-1.png');
UPDATE SHOP SET LOGO = 'traderlogo3.jpg' WHERE SHOP_ID = 3;
INSERT INTO SHOP(SHOP_ID, SHOP_NAME, SHOP_LOCATION, SHOP_REGISTRATION_NO, STATUS, FK1_USER_ID, LOGO) VALUES(shop_id_s.NEXTVAL, 'Vegetables Doorstep', 'Olddam', '456789', '1', '5', 'trader-logo-1.png');

INSERT INTO PRODUCT_CATEGORY(PRODUCT_CATEGORY_ID, CATEGORY_NAME) VALUES (product_category_id_s.NEXTVAL, 'Bakery');
INSERT INTO PRODUCT_CATEGORY(PRODUCT_CATEGORY_ID, CATEGORY_NAME) VALUES (product_category_id_s.NEXTVAL, 'Meat');
INSERT INTO PRODUCT_CATEGORY(PRODUCT_CATEGORY_ID, CATEGORY_NAME) VALUES (product_category_id_s.NEXTVAL, 'Fruits');
INSERT INTO PRODUCT_CATEGORY(PRODUCT_CATEGORY_ID, CATEGORY_NAME) VALUES (product_category_id_s.NEXTVAL, 'Vegetables');


INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Vanilla Cake', 'Old-fashioned vanilla cake is Bubbles Bakery’s heart and soul. Here, we take the same batter we use to make our famous cupcakes to make a rich, buttery cake with a light crumb, and layer it with vanilla or chocolate buttercream.', 'product-1.jpg', '30', '12.99','10.99', '1','none','Pounds', '2','12','05/15/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Blueberry Cake', 'This bright and beautiful dessert is perfect for any occasion. Layers of moist, crimson-colored cake are covered with your choice of whipped vanilla or cream cheese icing.', 'product-2.jpg', '60', '14.99','13.99', '1','None','Pounds', '1','12','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Strawberry Cake', 'The unique combination of strawberry and pecans flavor this classic Southern layer cake, which has a texture similar to our extra-moist strawberry     cake. We finish this bestseller with cream cheese icing and a sprinkling of pecans.', 'product-3.jpg', '25', '11.99','9.99', '1','None','Pounds', '1','15','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Strawberry Cheese Cake Cup', 'Strawberry Cheese Cake Cup Our bakery handles all the main allergens of dairy, nuts, peanuts, gluten (wheat), egg and soya. If you have a serious allergy to any of these allergens please contact us before you place an order', 'product-4.jpg', '35', '6.00','4.99', '1','None','Pounds', '1','10','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Daisy Cup Cakes', 'Reenact our favorite SATC scene with a crush-worthy vanilla cupcake topped with pink vanilla buttercream and a daisy.', 'product-5.jpg', '40', '6.00','4.99', '1','None','Pounds', '1','10','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Blueberry Cheesecake', 'Juicy blueberries top our timeless vanilla bean-infused cheesecake, finished with a graham cracker crust..', 'product-6.jpg', '60', '16.00','14.99', '1','None','Pounds', '1','12','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Blueberry Jamboree Icebox Bar', 'We layer whipped cream and fluffy cream cheese filling to make this chilled-out pie, then top it with a crown of juicy blueberries.', 'product-7.jpg', '60', '11.00','9.99', '1','None','Pounds', '1','12','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Key Lime Cheesecake', 'Taste the sweetness of summer all year long with our key lime cheesecake, flavored with fresh key lime juice and finished with a graham cracker crust and a dollop of whipped cream.', 'product-8.jpg', '60', '8.00','6.99', '1','None','Pounds', '1','12','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Red Velvet Cheesecake', 'Our prized red velvet cake—but make it cheesecake! Rich, chocolatey, and subtly tart cheese rests on a chocolate cookie crumb crust, with a dollop of whipped cream and chocolate shavings on top.', 'product-9.jpg', '30', '6.00','3.00', '1','Wheat, Milk, Eggs, Dairy, Gluten','Pounds', '1','12','05/16/2022','1','1');

INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Chocolate Strawberry Cake', 'Flavored with top-shelf chocolate beans atop a graham cracker crust, this rich cake is a classic for a deliciously good reason..', 'product-10.jpg', '30', '6.00','3.00', '1','Wheat, Milk, Eggs, Dairy, Gluten','Pounds', '1','12','05/16/2022','1','1');


INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Red Meat', 'The versatile and delicious Red-Meat™ is a pleasure to cook with. With its delightfully juicy and meaty texture, it’s the ideal base for any ground beef dish.', 'product-11.jpg', '30', '12.00','10.00', '1','','Pounds', '5','15','05/16/2022','2','2');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Shortloin Steak ', 'Steak lovers rejoice when cuts from the short loin subprimal appear on the grill.', 'product-12.jpg', '40', '14.00','12.00', '1','','Pounds', '3','16','05/16/2022','2','2');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Italian Meat', 'Osso buco is a classic Milanese dish of braised veal shanks in a hearty vegetable-based sauce.', 'product-13.jpg', '25', '12.00','9.00', '1','','Pounds', '4','16','05/16/2022','2','2');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Wagyu Burger', 'Sanchoku Wagyu is based on the Japanese philosophy that all produce should be “direct from the source”. This involves maintaining the highest level of transparency.', 'product-14.jpg', '100', '11.00','7.00', '1','','Pounds', '4','16','05/16/2022','2','2');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Duck Leg Male', 'Buy Our All-Natural Pekin Duck legs and thighs online! Our ducks are shipped same day as harvest - Guaranteed Fresh!', 'product-15.jpg', '40', '16.00','12.00', '1','','Pounds', '2','12','05/17/2022','2','2');


INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Orange', 'Scarlet Navels, delicious, seedless, gold on the outside and red on the inside.', 'product-16.jpg', '120', '12.00','10.00', '1','','lbs', '12','18','05/20/2022','3','3');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Strawberry', 'Strawberries are soft, sweet, bright red berries. They are a delicious quick snack or can be used in jams, desserts and cocktails.', 'product-17.jpg', '60', '6.00','5.00', '1','','lbs', '8','16','05/20/2022','3','3');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Blackberry', 'Ripe Blackberries have a deep inky sheen with purple highlights. They are succulent, juicy and flavour profile is sweet, mildly tart, with earthy undertones.', 'product-18.jpg', '120', '8.49','6.49', '1','','lbs', '4','16','05/20/2022','3','3');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Pomegranate', 'Pomegranate arils taste a lot like cranberries—fairly tart with a bit of sweetness underneath.', 'product-19.jpg', '60', '4.99','3.99', '1','','lbs', '12','18','05/20/2022','3','3');
INSERT INTO PRODUCT (PRODUCT_ID, PRODUCY_NAME, PRODUCT_DESCRIPTION, PRODUCT_IMAGE, PRODUCT_STOCK, PRODUCT_PRICE, OFFER_PRICE, PRODUCT_STATUS, PRODUCT_ALLERGY_INFO, PRODUCT_PORTION, MINIMUM_ORDER, MAXIMUM_ORDER, ADDED_DATE, FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID) VALUES (product_id_s.NEXTVAL, 'Red Watermelon', 'Watermelon can easily be called an "iconic summer fruit" due to its refreshing nature and signature sweet taste.', 'product-20.jpg', '80', '7.99','6.99', '1','','lbs', '2','16','05/20/2022','3','3');

UPDATE Product SET PRODUCT_IMAGE = 'product19.jpg' WHERE PRODUCT_ID = 19;


insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(1,'Wed','CLECKHUDDERFAX','10-13');

insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(2,'Wed','CLECKHUDDERFAX','13-16');

insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(3,'Wed','CLECKHUDDERFAX','16-19');


insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(4,'Thu','CLECKHUDDERFAX','10-13');

insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(5,'Thu','CLECKHUDDERFAX','13-16');
insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(6,'Thu','CLECKHUDDERFAX','16-19');

insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(7,'Fri','CLECKHUDDERFAX','10-13');

insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(8,'Fri','CLECKHUDDERFAX','13-16');
insert into COLLECTION_SLOT (collectionslot_id,collection_day,slot_location,collection_time)
values(9,'Fri','CLECKHUDDERFAX','16-19');


INSERT INTO CART_PRODUCT(cart_product_id, product_quantity, fk1_product_id, fk2_user_id) VALUES (product_cart_id_s.NEXTVAL, 2, 11, 2);
INSERT INTO CART_PRODUCT(cart_product_id, product_quantity, fk1_product_id, fk2_user_id) VALUES (product_cart_id_s.NEXTVAL, 4, 5, 2);
INSERT INTO CART_PRODUCT(cart_product_id, product_quantity, fk1_product_id, fk2_user_id) VALUES (product_cart_id_s.NEXTVAL, 3, 12, 2);
INSERT INTO CART_PRODUCT(cart_product_id, product_quantity, fk1_product_id, fk2_user_id) VALUES (product_cart_id_s.NEXTVAL, 10, 14, 2);

INSERT INTO PROD_ORDER(order_id, order_date, order_status, fk1_cart_product_id, fk2_collectionslot_id) VALUES (prod_order_s.NEXTVAL, '5/1/2022', '1', '1', '5');
INSERT INTO PROD_ORDER(order_id, order_date, order_status, fk1_cart_product_id, fk2_collectionslot_id) VALUES (prod_order_s.NEXTVAL, '5/1/2022', '1', '2', '6');
INSERT INTO PROD_ORDER(order_id, order_date, order_status, fk1_cart_product_id, fk2_collectionslot_id) VALUES (prod_order_s.NEXTVAL, '5/2/2022', '1', '3', '6');
INSERT INTO PROD_ORDER(order_id, order_date, order_status, fk1_cart_product_id, fk2_collectionslot_id) VALUES (prod_order_s.NEXTVAL, '5/3/2022', '1', '4', '5');



INSERT INTO PAYMENT(payment_id, payment_amount, payment_date, payment_method, fk1_order_id, fk2_user_id) VALUES (payment_id_s.NEXTVAL, '30', '5/21/2022', 'Paypal', '1', '2');
INSERT INTO PAYMENT(payment_id, payment_amount, payment_date, payment_method, fk1_order_id, fk2_user_id) VALUES (payment_id_s.NEXTVAL, '40', '5/21/2022', 'Paypal', '2', '2');


INSERT INTO ORDER_DETAILS (order_detail_id, product_quantity, fk1_order_id, fk2_product_id) VALUES (order_detail_s.NEXTVAL, '2', '1', '2' );
INSERT INTO ORDER_DETAILS (order_detail_id, product_quantity, fk1_order_id, fk2_product_id) VALUES (order_detail_s.NEXTVAL, '4', '2', '2' );
INSERT INTO ORDER_DETAILS (order_detail_id, product_quantity, fk1_order_id, fk2_product_id) VALUES (order_detail_s.NEXTVAL, '6', '3', '12' );
INSERT INTO ORDER_DETAILS (order_detail_id, product_quantity, fk1_order_id, fk2_product_id) VALUES (order_detail_s.NEXTVAL, '10', '3', '12' );



INSERT INTO WISHLIST_PRODUCT(wishlist_product_id, fk1_product_id, fk2_user_id) VALUES (wishlist_product_id_s.NEXTVAL, '1', '2');
INSERT INTO WISHLIST_PRODUCT(wishlist_product_id, fk1_product_id, fk2_user_id) VALUES (wishlist_product_id_s.NEXTVAL, '2', '2');


INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'These cupcakes deserves more praises. Best cupcakes I have ever had', '5', '5/21/2022', '5', '2' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'The best moist cake ever! The vanilla filling is really worth it', '4', '5/21/2022', '1', '2' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'So delicious! Wish I could order more', '4', '5/22/2022', '1', '1' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'Tasty as expected!', '5', '5/22/2022', '1', '1' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'Its the best strwberries I have had. So delicious!', '5', '5/22/2022', '17', '2' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'Very tasty and freshly sourced. Will order more!', '5', '5/22/2022', '18', '2' );
INSERT INTO REVIEW (Review_id, review_comment, review_rating, review_date, fk1_product_id, fk2_user_id) VALUES (review_s.NEXTVAL, 'Just as expected. Couldnt ask for more ', '5', '5/22/2022', '18', '1' );


INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '5', '1');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '5', '2');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '5', '3');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '5', '4');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '5', '5');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '10', '6');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '10', '7');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '10', '8');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '10', '9');
INSERT INTO DISCOUNT (discount_id, discount_percent, fk1_product_id) VALUES (discount_s.NEXTVAL, '10', '10');

















