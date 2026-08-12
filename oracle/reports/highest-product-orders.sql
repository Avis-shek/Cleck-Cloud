select count(*) as no_of_orders, producy_name 
from PRODUCT P
JOIN ORDER_DETAILS OD
ON OD.fk2_product_id=P.PRODUCT_ID
and fk1_shop_id IN (select shop_id from shop where fk1_user_id=(select USER_ID from cleck_user where UPPER(user_name)= UPPER(:APP_USER)))
group by producy_name
