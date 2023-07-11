-- Заполнение таблицы store_website
INSERT INTO store_website (code, name, sort_order, default_group_id, is_default, created_at, updated_at)
VALUES
('website_code1', 'Website 1', 1, NULL, 0, NOW(), NOW()),
('website_code2', 'Website 2', 2, NULL, 0, NOW(), NOW());

-- Заполнение таблицы store_group
INSERT INTO store_group (website_id, name, root_category_id, default_store_id, created_at, updated_at)
VALUES
((SELECT id FROM store_website WHERE code = 'website_code1'), 'Group 1', 1, NULL, NOW(), NOW()),
((SELECT id FROM store_website WHERE code = 'website_code2'), 'Group 2', 2, NULL, NOW(), NOW());

-- Заполнение таблицы store
INSERT INTO store (code, website_id, group_id, name, sort_order, is_active, created_at, updated_at)
VALUES
('store_code1', (SELECT id FROM store_website WHERE code = 'website_code1'), (SELECT id FROM store_group WHERE name = 'Group 1'), 'Store 1', 1, 1, NOW(), NOW()),
('store_code2', (SELECT id FROM store_website WHERE code = 'website_code2'), (SELECT id FROM store_group WHERE name = 'Group 2'), 'Store 2', 2, 1, NOW(), NOW());

-- Заполнение таблицы catalog_category_entity
INSERT INTO catalog_category_entity (parent_id, path, position, level, children_count, created_at, updated_at)
VALUES
(NULL, '1', 1, 0, 0, NOW(), NOW()),
(1, '1/2', 2, 1, 0, NOW(), NOW());

-- Заполнение таблицы catalog_product_entity
INSERT INTO catalog_product_entity (attribute_set_id, type_id, sku, has_options, required_options, created_at, updated_at)
VALUES
(1, 'simple', 'SKU001', 0, 0, NOW(), NOW()),
(2, 'configurable', 'SKU002', 1, 1, NOW(), NOW());

-- Заполнение таблицы catalog_category_product
INSERT INTO catalog_category_product (category_id, product_id, position, created_at, updated_at)
VALUES
((SELECT id FROM catalog_category_entity WHERE path = '1'), (SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), 1, NOW(), NOW()),
((SELECT id FROM catalog_category_entity WHERE path = '1/2'), (SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), 1, NOW(), NOW());

-- Заполнение таблицы eav_entity_type
INSERT INTO eav_entity_type (entity_type_code, entity_type_name, created_at, updated_at)
VALUES
('entity_type_code1', 'Entity Type 1', NOW(), NOW()),
('entity_type_code2', 'Entity Type 2', NOW(), NOW());

-- Заполнение таблицы eav_attribute
INSERT INTO eav_attribute (code, frontend_label, created_at, updated_at)
VALUES
('attribute_code1', 'Attribute 1', NOW(), NOW()),
('attribute_code2', 'Attribute 2', NOW(), NOW());

-- Заполнение таблицы eav_attribute_label
INSERT INTO eav_attribute_label (attribute_id, locale, label, created_at, updated_at)
VALUES
((SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 'en_US', 'Attribute Label 1', NOW(), NOW()),
((SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 'en_US', 'Attribute Label 2', NOW(), NOW());

-- Заполнение таблицы eav_attribute_set
INSERT INTO eav_attribute_set (entity_type_id, attribute_set_name, sort_order, created_at, updated_at)
VALUES
((SELECT id FROM eav_entity_type WHERE entity_type_code = 'entity_type_code1'), 'Attribute Set 1', 1, NOW(), NOW()),
((SELECT id FROM eav_entity_type WHERE entity_type_code = 'entity_type_code2'), 'Attribute Set 2', 2, NOW(), NOW());

-- Заполнение таблицы eav_attribute_group
INSERT INTO eav_attribute_group (attribute_set_id, attribute_group_name, sort_order, created_at, updated_at)
VALUES
((SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Attribute Set 1'), 'Attribute Group 1', 1, NOW(), NOW()),
((SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Attribute Set 2'), 'Attribute Group 2', 2, NOW(), NOW());

-- Заполнение таблицы eav_entity_attribute
INSERT INTO eav_entity_attribute (entity_type_id, attribute_set_id, attribute_group_id, attribute_id, sort_order, created_at, updated_at)
VALUES
((SELECT id FROM eav_entity_type WHERE entity_type_code = 'entity_type_code1'), (SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Attribute Set 1'), (SELECT id FROM eav_attribute_group WHERE attribute_group_name = 'Attribute Group 1'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 1, NOW(), NOW()),
((SELECT id FROM eav_entity_type WHERE entity_type_code = 'entity_type_code2'), (SELECT id FROM eav_attribute_set WHERE attribute_set_name = 'Attribute Set 2'), (SELECT id FROM eav_attribute_group WHERE attribute_group_name = 'Attribute Group 2'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 2, NOW(), NOW());

-- Заполнение таблицы catalog_product_entity_varchar
INSERT INTO catalog_product_entity_varchar (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 0, 'Value 1', NOW(), NOW()),
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 0, 'Value 2', NOW(), NOW());

-- Заполнение таблицы catalog_product_entity_int
INSERT INTO catalog_product_entity_int (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 0, 1, NOW(), NOW()),
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 0, 2, NOW(), NOW());

-- Заполнение таблицы catalog_product_entity_text
INSERT INTO catalog_product_entity_text (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 0, 'Text Value 1', NOW(), NOW()),
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 0, 'Text Value 2', NOW(), NOW());

-- Заполнение таблицы catalog_product_entity_decimal
INSERT INTO catalog_product_entity_decimal (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 0, 1.23, NOW(), NOW()),
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 0, 4.56, NOW(), NOW());

-- Заполнение таблицы catalog_product_entity_datetime
INSERT INTO catalog_product_entity_datetime (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU001'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 0, NOW(), NOW(), NOW()),
((SELECT id FROM catalog_product_entity WHERE sku = 'SKU002'), (SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 0, NOW(), NOW(), NOW());

-- Заполнение таблицы eav_attribute_option
INSERT INTO eav_attribute_option (attribute_id, sort_order, created_at, updated_at)
VALUES
((SELECT id FROM eav_attribute WHERE code = 'attribute_code1'), 1, NOW(), NOW()),
((SELECT id FROM eav_attribute WHERE code = 'attribute_code2'), 2, NOW(), NOW());

-- Заполнение таблицы eav_attribute_option_value
INSERT INTO eav_attribute_option_value (option_id, locale, value, created_at, updated_at)
VALUES
((SELECT id FROM eav_attribute_option WHERE attribute_id = (SELECT id FROM eav_attribute WHERE code = 'attribute_code1')), 'en_US', 'Option 1', NOW(), NOW()),
((SELECT id FROM eav_attribute_option WHERE attribute_id = (SELECT id FROM eav_attribute WHERE code = 'attribute_code2')), 'en_US', 'Option 2', NOW(), NOW());
