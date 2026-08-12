

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