-- Вставляем данные в таблицу store_website
INSERT INTO store_website (code, name, sort_order, is_default)
VALUES ('base', 'Main Website', 0, 1);

-- Вставляем данные в таблицу store_group
INSERT INTO store_group (website_id, code, name, root_category_id)
VALUES ((SELECT id FROM store_website WHERE code = 'base'), 'main_website_store', 'Main Website Store', 1);

-- Вставляем данные в таблицу store
INSERT INTO store (code, website_id, group_id, name, sort_order, is_active)
VALUES ('default', (SELECT id FROM store_website WHERE code = 'base'), (SELECT id FROM store_group WHERE code = 'main_website_store'), 'Default Store View', 0, 1);

-- Вставляем данные в таблицу catalog_category_entity
INSERT INTO catalog_category_entity (parent_id, path, position, level, children_count)
VALUES (NULL, '/1/', 0, 1, 2);

-- Вставляем данные в таблицу catalog_product_entity
INSERT INTO catalog_product_entity (attribute_set_id, type_id, sku, has_options, required_options)
VALUES (1, 'simple', '24-MB01', 0, 0);

-- Вставляем данные в таблицу catalog_category_product
INSERT INTO catalog_category_product (category_id, product_id, position)
VALUES ((SELECT id FROM catalog_category_entity WHERE path = '/1/'), (SELECT id FROM catalog_product_entity WHERE sku = '24-MB01'), 1);

-- Вставляем данные в таблицу eav_entity_type
INSERT INTO eav_entity_type (entity_type_code, entity_type_name)
VALUES ('catalog_product', 'Product');

-- Вставляем данные в таблицу eav_attribute
INSERT INTO eav_attribute (code, frontend_label, attribute_code, backend_type, frontend_input, is_required, is_unique, position, is_global, is_visible, is_searchable, is_filterable, is_comparable, is_visible_on_front, is_wysiwyg_enabled)
VALUES ('name', 'Product Name', 'name', 'varchar', 'text', 1, 0, 0, 1, 1, 1, 1, 1, 1, 0);

-- Вставляем данные в таблицу eav_attribute_label
INSERT INTO eav_attribute_label (attribute_id, locale, label)
VALUES ((SELECT id FROM eav_attribute WHERE code = 'name'), 'en_US', 'Product Name');

-- Вставляем данные в таблицу eav_attribute_set
INSERT INTO eav_attribute_set (entity_type_id, attribute_set_name)
VALUES ((SELECT id FROM eav_entity_type WHERE entity_type_code = 'catalog_product'), 'Default');

-- Вставляем данные в таблицу eav_attribute_group
INSERT INTO eav_attribute_group (attribute_set_id, attribute_group_name)
VALUES ((SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Default'), 'General');

-- Вставляем данные в таблицу eav_entity_attribute
INSERT INTO eav_entity_attribute (entity_type_id, attribute_set_id, attribute_group_id, attribute_id)
VALUES ((SELECT id FROM eav_entity_type WHERE entity_type_code = 'catalog_product'), (SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Default'), (SELECT id FROM eav_attribute_group WHERE attribute_group_name = 'General'), (SELECT id FROM eav_attribute WHERE code = 'name'));

-- Вставляем данные в таблицу catalog_product_entity_varchar
INSERT INTO catalog_product_entity_varchar (entity_id, attribute_id, store_id, value)
VALUES ((SELECT id FROM catalog_product_entity WHERE sku = '24-MB01'), (SELECT id FROM eav_attribute WHERE code = 'name'), 0, 'Joust Duffle Bag');

-- Вставляем данные в таблицу eav_attribute_option
INSERT INTO eav_attribute_option (attribute_id, sort_order)
VALUES ((SELECT id FROM eav_attribute WHERE code = 'name'), 1);

-- Вставляем данные в таблицу eav_attribute_option_value
INSERT INTO eav_attribute_option_value (option_id, locale, value)
VALUES ((SELECT id FROM eav_attribute_option WHERE attribute_id = (SELECT id FROM eav_attribute WHERE code = 'name')), 'en_US', 'Joust Duffle Bag');

-- Вставляем данные для атрибута SKU
INSERT INTO eav_attribute (code, frontend_label, attribute_code, backend_type, frontend_input, is_required, is_unique, position, is_global, is_visible, is_searchable, is_filterable, is_comparable, is_visible_on_front, is_wysiwyg_enabled)
VALUES ('sku', 'SKU', 'sku', 'varchar', 'text', 1, 1, 0, 1, 1, 1, 1, 1, 1, 0);

-- Вставляем данные в таблицу catalog_product_entity_varchar для SKU
INSERT INTO catalog_product_entity_varchar (entity_id, attribute_id, store_id, value)
VALUES ((SELECT id FROM catalog_product_entity WHERE sku = '24-MB01'), (SELECT id FROM eav_attribute WHERE code = 'sku'), 0, '24-MB01');

-- Вставляем данные для атрибута Description
INSERT INTO eav_attribute (code, frontend_label, attribute_code, backend_type, frontend_input, is_required, is_unique, position, is_global, is_visible, is_searchable, is_filterable, is_comparable, is_visible_on_front, is_wysiwyg_enabled)
VALUES ('description', 'Description', 'description', 'text', 'textarea', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1);

-- Вставляем данные в таблицу catalog_product_entity_text для Description
INSERT INTO catalog_product_entity_text (entity_id, attribute_id, store_id, value)
VALUES ((SELECT id FROM catalog_product_entity WHERE sku = '24-MB01'), (SELECT id FROM eav_attribute WHERE code = 'description'), 0, 'Joust Duffle Bag is the perfect bag for everyday use.');

-- Вставляем данные для атрибута Price
INSERT INTO eav_attribute (code, frontend_label, attribute_code, backend_type, frontend_input, is_required, is_unique, position, is_global, is_visible, is_searchable, is_filterable, is_comparable, is_visible_on_front, is_wysiwyg_enabled)
VALUES ('price', 'Price', 'price', 'decimal', 'price', 1, 0, 2, 1, 1, 0, 1, 1, 1, 0);

-- Вставляем данные в таблицу catalog_product_entity_decimal для Price
INSERT INTO catalog_product_entity_decimal (entity_id, attribute_id, store_id, value)
VALUES ((SELECT id FROM catalog_product_entity WHERE sku = '24-MB01'), (SELECT id FROM eav_attribute WHERE code = 'price'), 0, 34.00);
