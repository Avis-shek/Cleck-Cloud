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

