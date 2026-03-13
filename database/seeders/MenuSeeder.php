<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Entrantes',
                'slug' => 'entrantes',
                'type' => 'food',
                'sort_order' => 1,
                'items' => [
                    ['name' => 'Jamón Ibérico de Bellota', 'description' => 'Jamón ibérico de bellota cortado a cuchillo con pan con tomate', 'price' => 18.50, 'allergens' => 'Gluten'],
                    ['name' => 'Croquetas de la Abuela', 'description' => 'Croquetas caseras de jamón y pollo, crujientes por fuera y cremosas por dentro', 'price' => 9.50, 'allergens' => 'Gluten, Lácteos, Huevo'],
                    ['name' => 'Pimientos del Piquillo Rellenos', 'description' => 'Pimientos del piquillo rellenos de bacalao con salsa de tomate', 'price' => 11.00, 'allergens' => 'Pescado'],
                    ['name' => 'Gambas al Ajillo', 'description' => 'Gambas frescas salteadas con ajo, guindilla y aceite de oliva virgen extra', 'price' => 13.50, 'allergens' => 'Crustáceos'],
                    ['name' => 'Tabla de Quesos Artesanos', 'description' => 'Selección de quesos artesanos nacionales con membrillo y nueces', 'price' => 14.00, 'allergens' => 'Lácteos, Frutos secos'],
                    ['name' => 'Pulpo a la Gallega', 'description' => 'Pulpo cocido sobre cama de patata, pimentón de la vera y aceite de oliva', 'price' => 16.50, 'allergens' => 'Moluscos'],
                    ['name' => 'Carpaccio de Buey', 'description' => 'Finas láminas de buey con rúcula, parmesano y aceite de trufa', 'price' => 15.00, 'allergens' => 'Lácteos'],
                    ['name' => 'Boquerones en Vinagre', 'description' => 'Boquerones marinados en vinagre con ajo y perejil', 'price' => 8.50, 'allergens' => 'Pescado'],
                    ['name' => 'Ensaladilla Rusa Casera', 'description' => 'Ensaladilla rusa tradicional con atún, aceitunas y mayonesa casera', 'price' => 7.50, 'allergens' => 'Pescado, Huevo'],
                    ['name' => 'Patatas Bravas con Alioli', 'description' => 'Patatas fritas con salsa brava picante y alioli casero', 'price' => 7.00, 'allergens' => 'Huevo'],
                ],
            ],
            [
                'name' => 'Primeros Platos',
                'slug' => 'primeros',
                'type' => 'food',
                'sort_order' => 2,
                'items' => [
                    ['name' => 'Sopa Castellana', 'description' => 'Sopa de ajo con pan, pimentón, jamón y huevo escalfado', 'price' => 9.00, 'allergens' => 'Gluten, Huevo'],
                    ['name' => 'Crema de Calabaza', 'description' => 'Crema de calabaza asada con nata, pipas de calabaza y aceite de oliva', 'price' => 8.50, 'allergens' => 'Lácteos'],
                    ['name' => 'Ensalada de Temporada', 'description' => 'Mezcla de lechugas, tomate cherry, pepino, zanahoria y vinagreta de mostaza', 'price' => 9.50, 'allergens' => 'Mostaza'],
                    ['name' => 'Paella Valenciana', 'description' => 'Paella tradicional valenciana con pollo, conejo y judías verdes', 'price' => 14.00, 'allergens' => 'Gluten'],
                    ['name' => 'Fideuà de Marisco', 'description' => 'Fideuà con gambas, mejillones y calamares en caldo de marisco', 'price' => 15.50, 'allergens' => 'Gluten, Crustáceos, Moluscos'],
                    ['name' => 'Lentejas Estofadas', 'description' => 'Lentejas estofadas con chorizo, morcilla y verduras de temporada', 'price' => 11.00, 'allergens' => 'Gluten'],
                    ['name' => 'Risotto de Setas', 'description' => 'Risotto cremoso con setas de temporada, trufa negra y parmesano', 'price' => 13.50, 'allergens' => 'Lácteos'],
                    ['name' => 'Pasta Fresca al Pesto', 'description' => 'Pasta fresca casera con pesto genovés, piñones y parmesano', 'price' => 12.00, 'allergens' => 'Gluten, Lácteos, Frutos secos'],
                    ['name' => 'Gazpacho Andaluz', 'description' => 'Gazpacho tradicional andaluz con sus guarniciones clásicas', 'price' => 7.50, 'allergens' => 'Gluten'],
                    ['name' => 'Revuelto de Trufa y Foie', 'description' => 'Revuelto de huevo con trufa negra, foie y crujiente de pan', 'price' => 16.00, 'allergens' => 'Huevo, Gluten'],
                ],
            ],
            [
                'name' => 'Segundos Platos',
                'slug' => 'segundos',
                'type' => 'food',
                'sort_order' => 3,
                'items' => [
                    ['name' => 'Chuletón de Buey a la Brasa', 'description' => 'Chuletón de buey madurado a la brasa de carbón con patatas asadas', 'price' => 32.00, 'allergens' => null],
                    ['name' => 'Lubina a la Sal', 'description' => 'Lubina fresca cocinada a la sal con verduras de temporada', 'price' => 24.00, 'allergens' => 'Pescado'],
                    ['name' => 'Cochinillo Asado', 'description' => 'Cochinillo segoviano asado al horno lento con su jugo', 'price' => 28.00, 'allergens' => null],
                    ['name' => 'Merluza en Salsa Verde', 'description' => 'Merluza fresca en salsa verde con almejas y espárragos', 'price' => 22.00, 'allergens' => 'Pescado, Moluscos'],
                    ['name' => 'Solomillo Wellington', 'description' => 'Solomillo de ternera envuelto en hojaldre con duxelles de setas', 'price' => 30.00, 'allergens' => 'Gluten'],
                    ['name' => 'Pato a la Naranja', 'description' => 'Confit de pato con salsa de naranja y puré de patata trufado', 'price' => 26.00, 'allergens' => 'Lácteos'],
                    ['name' => 'Rape en Salsa de Azafrán', 'description' => 'Rape a la plancha con salsa de azafrán y gambas', 'price' => 27.00, 'allergens' => 'Pescado, Crustáceos'],
                    ['name' => 'Cordero Asado a la Castellana', 'description' => 'Paletilla de cordero lechal asada en su jugo con ajos y tomillo', 'price' => 29.00, 'allergens' => null],
                    ['name' => 'Pollo de Corral al Horno', 'description' => 'Pollo de corral asado con patatas panadera y hierbas aromáticas', 'price' => 19.00, 'allergens' => null],
                    ['name' => 'Bacalao al Pil-Pil', 'description' => 'Bacalao desalado cocinado en aceite con ajo al estilo vasco', 'price' => 23.00, 'allergens' => 'Pescado'],
                ],
            ],
            [
                'name' => 'Postres',
                'slug' => 'postres',
                'type' => 'food',
                'sort_order' => 4,
                'items' => [
                    ['name' => 'Tarta de Santiago', 'description' => 'Tradicional tarta de almendra gallega con azúcar glasé', 'price' => 6.50, 'allergens' => 'Frutos secos, Huevo'],
                    ['name' => 'Crema Catalana', 'description' => 'Crema catalana con su costra de azúcar caramelizado', 'price' => 5.50, 'allergens' => 'Lácteos, Huevo'],
                    ['name' => 'Coulant de Chocolate', 'description' => 'Bizcocho tibio de chocolate con corazón fundente y helado de vainilla', 'price' => 7.50, 'allergens' => 'Gluten, Lácteos, Huevo'],
                    ['name' => 'Arroz con Leche Caramelizado', 'description' => 'Arroz con leche cremoso al estilo asturiano con canela y limón', 'price' => 5.50, 'allergens' => 'Lácteos'],
                    ['name' => 'Torrija Caramelizada', 'description' => 'Torrija artesana con helado de vainilla y salsa de caramelo', 'price' => 6.00, 'allergens' => 'Gluten, Lácteos, Huevo'],
                    ['name' => 'Flan de Huevo Casero', 'description' => 'Flan de huevo artesano con caramelo líquido y nata montada', 'price' => 5.00, 'allergens' => 'Lácteos, Huevo'],
                    ['name' => 'Sorbete de Frutas del Bosque', 'description' => 'Sorbete artesano de frutos del bosque con coulis de frambuesa', 'price' => 5.50, 'allergens' => null],
                ],
            ],
            [
                'name' => 'Bebidas',
                'slug' => 'bebidas',
                'type' => 'drink',
                'sort_order' => 5,
                'items' => [
                    ['name' => 'Agua Mineral (50cl)', 'description' => 'Agua mineral natural o con gas', 'price' => 2.00, 'allergens' => null],
                    ['name' => 'Agua Mineral (1L)', 'description' => 'Agua mineral natural o con gas, botella de 1 litro', 'price' => 3.00, 'allergens' => null],
                    ['name' => 'Coca-Cola', 'description' => 'Coca-Cola original en lata 33cl', 'price' => 2.50, 'allergens' => null],
                    ['name' => 'Coca-Cola Zero', 'description' => 'Coca-Cola sin azúcar en lata 33cl', 'price' => 2.50, 'allergens' => null],
                    ['name' => 'Fanta Naranja', 'description' => 'Fanta sabor naranja en lata 33cl', 'price' => 2.50, 'allergens' => null],
                    ['name' => 'Fanta Limón', 'description' => 'Fanta sabor limón en lata 33cl', 'price' => 2.50, 'allergens' => null],
                    ['name' => 'Nestea Limón', 'description' => 'Té helado de limón en lata 33cl', 'price' => 2.50, 'allergens' => null],
                ],
            ],
            [
                'name' => 'Vinos Blancos',
                'slug' => 'vinos-blancos',
                'type' => 'drink',
                'sort_order' => 6,
                'items' => [
                    ['name' => 'Albariño Martín Códax', 'description' => 'D.O. Rías Baixas - Vino blanco fresco y afrutado con notas a flores y frutas cítricas', 'price' => 22.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Rueda Verdejo Belondrade', 'description' => 'D.O. Rueda - Verdejo de alta expresión, complejo y elegante', 'price' => 28.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Viñas del Vero Chardonnay', 'description' => 'D.O. Somontano - Chardonnay con crianza en barrica, equilibrado y cremoso', 'price' => 20.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Bodegas Cariñena Blanco', 'description' => 'D.O. Cariñena - Vino blanco aromático elaborado con uvas autóctonas', 'price' => 16.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Gran Cariñena Garnacha Blanca', 'description' => 'D.O. Cariñena - Garnacha blanca con carácter mediterráneo y mineral', 'price' => 18.00, 'allergens' => 'Sulfitos'],
                ],
            ],
            [
                'name' => 'Vinos Tintos',
                'slug' => 'vinos-tintos',
                'type' => 'drink',
                'sort_order' => 7,
                'items' => [
                    ['name' => 'Rioja Reserva Marqués de Riscal', 'description' => 'D.O.Ca. Rioja - Reserva clásico, elegante con taninos suaves y notas de vainilla', 'price' => 32.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Ribera del Duero Pesquera', 'description' => 'D.O. Ribera del Duero - Tinto robusto y complejo con fruta negra y especias', 'price' => 35.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Priorat Clos Mogador', 'description' => 'D.O.Q. Priorat - Vino de gran expresión, potente y mineral', 'price' => 45.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Toro Numanthia', 'description' => 'D.O. Toro - Tinto intenso elaborado con Tinta de Toro, amplio y estructurado', 'price' => 38.00, 'allergens' => 'Sulfitos'],
                    ['name' => 'Cariñena Monte Ducay Reserva', 'description' => 'D.O. Cariñena - Reserva con garnacha, con carácter mediterráneo y excelente relación calidad-precio', 'price' => 19.00, 'allergens' => 'Sulfitos'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $items = $categoryData['items'];
            unset($categoryData['items']);

            $category = MenuCategory::create($categoryData);

            foreach ($items as $itemData) {
                $category->items()->create($itemData);
            }
        }
    }
}
