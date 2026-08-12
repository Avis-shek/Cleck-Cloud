select P.producy_name, P.product_image,  OD.order_detail_id, OD.product_quantity, PO.order_id, PO.order_date, CS.collection_day, CS.slot_location, CS.collection_time from product P
JOIN order_details OD
On OD.fk2_product_id=P.product_id
JOIN prod_order PO
ON PO.order_id=OD.fk1_order_id
JOIN collection_slot CS
ON CS.collectionslot_id=PO.fk2_collectionslot_id
where order_date = SYSDATE

