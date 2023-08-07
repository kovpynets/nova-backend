<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttribute extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute';

    protected $primaryKey = 'id';

    protected $fillable = [
        'frontend_label',
        'attribute_code',
        'backend_model',
        'backend_type',
        'backend_table',
        'frontend_model',
        'frontend_input',
        'frontend_class',
        'source_model',
        'is_required',
        'is_unique',
        'note',
        'default_value',
        'is_global',
        'is_visible',
        'is_searchable',
        'is_filterable',
        'is_comparable',
        'is_visible_on_front',
        'is_html_allowed_on_front',
        'is_used_for_price_rules',
        'is_filterable_in_search',
        'used_in_product_listing',
        'used_for_sort_by',
        'apply_to',
        'is_visible_in_advanced_search',
        'position',
        'is_wysiwyg_enabled',
        'is_used_for_promo_rules',
        'is_required_in_admin_store',
        'is_used_in_grid',
        'is_visible_in_grid',
        'is_filterable_in_grid',
        'search_weight',
        'additional_data',
        'entity_type_id',
        'is_used_for_customer_segment',
        'is_system',
        'is_used_in_form_post_data',
        'frontend_input_renderer',
        'is_global',
        'is_visible_in_advanced_search',
        'position',
        'is_wysiwyg_enabled',
        'is_used_for_promo_rules',
        'is_required_in_admin_store',
        'is_used_in_grid',
        'is_visible_in_grid',
        'is_filterable_in_grid',
        'search_weight',
        'additional_data',
        'entity_type_id',
        'is_used_for_customer_segment',
        'is_system',
        'is_used_in_form_post_data',
        'frontend_input_renderer',
    ];

    public function attributeLabels()
    {
        return $this->hasMany(EavAttributeLabel::class, 'attribute_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(EavAttributeOption::class, 'attribute_id', 'id');
    }

}
