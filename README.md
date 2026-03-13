# Restaurante El Sabor - Sistema de Gestión

Aplicación web completa para gestión de un restaurante con panel de camareros.

## Requisitos
- PHP 8.2+
- MySQL (MAMP con puerto 8889)
- Node.js / npm

## Instalación

```bash
# Ya instalado. Si se reinstala:
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
```

## URL de acceso

Con MAMP: **http://localhost:8888/restaurante/public**

## Credenciales de Camareros

| Usuario | Email | Contraseña |
|---------|-------|------------|
| Carlos García | camarero@restaurante.com | camarero123 |
| María López | maria@restaurante.com | camarero123 |
| Admin | admin@restaurante.com | admin123 |

## Estructura de la Web Pública

| Sección | URL |
|---------|-----|
| Inicio | / |
| La Carta | /carta |
| Espacios | /espacios |
| Reservas | /reservas |
| Contacto | /contacto |

## Panel de Camareros

| Sección | URL |
|---------|-----|
| Login | /login |
| Panel de Mesas | /panel |
| Detalle Mesa | /panel/mesa/{id} |

## La Carta
- **10 Entrantes**
- **10 Primeros Platos**
- **10 Segundos Platos**
- **7 Postres**
- **Bebidas**: Agua (50cl y 1L), Coca-Cola, Coca-Cola Zero, Fanta Naranja, Fanta Limón, Nestea
- **Vinos Blancos**: 5 vinos (2 de D.O. Cariñena)
- **Vinos Tintos**: 5 vinos (1 de D.O. Cariñena)

## Espacios disponibles
- **Bar (B1-B6)**: 6 mesas
- **Salón (S1-S8)**: 8 mesas
- **Restaurante (R1-R10)**: 10 mesas

## Funcionalidades del Panel de Camareros
1. Ver estado de todas las mesas (verde = libre, rojo = ocupada, naranja = reservada)
2. Seleccionar mesa para ver detalles y crear comanda
3. Enviar comanda a cocina con artículos de la carta
4. Actualizar estado de la comanda (Enviada → Preparando → Lista)
5. Liberar mesa cuando los clientes se van

##Iniciar repositorio de en GitHub
git init
git add .
git commit -m "primer commit"
git branch -M main
git remote add origin https://github.com/DavidMur2304/restaurante.git
git push -u origin main

##Actualizar repositorio de en GitHub
git add .
git commit -m "actualizacion"
git push -u origin main

##Actualizar repositorio de en GitHub desde local
git pull

##Ver historial de cambios
git log

