select CU.user_fullname, CU.email, P.payment_amount, P.payment_method, P.payment_date from cleck_user CU
JOIN Payment P
ON P.fk2_user_id=CU.user_id
where CU.user_role='C'