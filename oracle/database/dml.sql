
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

