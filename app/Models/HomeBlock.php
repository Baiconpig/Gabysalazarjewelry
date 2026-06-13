<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'slug',
    'page_slug',
    'name',
    'eyebrow',
    'title',
    'body',
    'button_label',
    'button_url',
    'secondary_button_label',
    'secondary_button_url',
    'image_path',
    'logo_path',
    'sort_order',
    'is_active',
])]
class HomeBlock extends Model
{
    public const PAGE_LABELS = [
        'home' => 'Inicio',
        'history' => 'Historia de la marca',
        'catalog' => 'Catalogo de joyas',
        'collections' => 'Galerias de colecciones',
        'custom-made' => 'Custom Made',
        'custom-request' => 'Pieza personalizada',
        'appointments' => 'Agenda de citas',
        'instagram' => 'Instagram',
        'testimonials' => 'Testimonios',
        'contact' => 'Contacto',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
