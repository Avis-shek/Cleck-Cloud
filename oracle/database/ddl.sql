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