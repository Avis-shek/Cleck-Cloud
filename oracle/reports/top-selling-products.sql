select * from(
select producy_name ,  
sum(order_details.product_quantity) as Total
from product, order_details 
where product_id = fk2_product_id
and fk1_shop_id IN (select shop_id from shop where fk1_user_id=(select USER_ID from cleck_user where UPPER(user_name)= UPPER(:APP_USER)))
group by producy_name 
order by sum(order_details.product_quantity) desc
) where rownum <= 5;
