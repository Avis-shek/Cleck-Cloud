select sum(payment_amount), prod_order.order_date from payment, prod_order 
where prod_order.order_id = payment.fk1_order_id 
group by prod_order.order_date;

