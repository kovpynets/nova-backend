Атрибуты:

Получение списка атрибутов: GET /api/core/eav-attribute
Получение конкретного атрибута: GET /api/core/eav-attribute/{attributeId}
Создание атрибута: POST /api/core/eav-attribute
Обновление атрибута: PUT /api/core/eav-attribute/{attributeId}
Удаление атрибута: DELETE /api/core/eav-attribute/{attributeId}
Опции атрибутов:

Получение списка опций для атрибута: GET /api/core/eav-attribute/{id}/options
Получение конкретной опции для атрибута: GET /api/core/eav-attribute/{attributeId}/options/{optionId}
Создание опции для атрибута: POST /api/core/eav-attribute/{attributeId}/options
Обновление опции для атрибута: PUT /api/core/eav-attribute/{attributeId}/options/{optionId}
Удаление опции для атрибута: DELETE /api/core/eav-attribute/{attributeId}/options/{optionId}
Значения опций:

Получение списка значений для опции: GET /api/core/eav-attribute/{attributeId}/options/{optionId}/values
Получение конкретного значения для опции: GET /api/core/eav-attribute/{attributeId}/options/{optionId}/values/{valueId}
Создание значения для опции: POST /api/core/eav-attribute/{attributeId}/options/{optionId}/values
Обновление значения для опции: PUT /api/core/eav-attribute/{attributeId}/options/{optionId}/values/{valueId}
Удаление значения для опции: DELETE /api/core/eav-attribute/{attributeId}/options/{optionId}/values/{valueId}
