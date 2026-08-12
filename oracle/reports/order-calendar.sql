select C.user_fullname, PO.order_date from cleck_user C
JOIN CART_PRODUCT CP
ON CP.fk2_user_id=C.user_id
JOIN PROD_ORDER PO
ON PO.fk1_cart_product_id=PO.fk1_cart_product_id
