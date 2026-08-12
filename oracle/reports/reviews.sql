select CU.user_fullname, R.review_comment, R.review_rating, P.producy_name from cleck_user CU
JOIN Review R
ON R.fk2_user_id=CU.user_id
JOIN Product P
ON P.product_id=R.fk1_product_id