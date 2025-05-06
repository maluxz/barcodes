# Generador de Etiquetas en PDF para Inventario

Este proyecto permite generar etiquetas en formato PDF a partir de una lista de **códigos internos** o **números de serie**, distribuidas uniformemente en una hoja tamaño **Carta**. Puede incluir o no **códigos de barras** en formato **Code128**. Es ideal para inventariar equipos como impresoras, computadoras y otros activos.

## 📌 Características

- Generación automática de etiquetas a partir de una lista proporcionada por el usuario.
- Salida en PDF con etiquetas distribuidas en:
  - **4 columnas × 20 filas** (80 etiquetas por hoja).
- Soporte para **texto simple** o **códigos de barras (Code128)**.
- Estilo simple y profesional, listo para impresión.
- Interfaz web básica para ingreso manual de códigos.

## 🧰 Tecnologías Utilizadas

- [PHP](https://www.php.net/) (versión 7.4+)
- [FPDF](http://www.fpdf.org/) – para generación de archivos PDF.
- [Picqer/php-barcode-generator](https://github.com/picqer/php-barcode-generator) – para generación de códigos de barras (opcional).
- HTML/CSS – para el formulario de ingreso de datos.

## 🚀 Instalación

1. Clona este repositorio:

```bash
git clone https://github.com/maluxz/barcodes.git
cd barcodes
```

2. Instala dependencias con Composer:

```bash
composer install
```

3. Asegúrate de que tu servidor local (ej. XAMPP o similar) esté apuntando al directorio del proyecto.

## 🖥️ Uso

1. Abre `index.html` en tu navegador o accede desde tu servidor local (por ejemplo: `http://localhost/barcodes/index.html`).

2. Ingresa los **códigos internos**, uno por línea.

3. Haz clic en **"Generar PDF"**.

4. Se abrirá una nueva pestaña o ventana con el PDF generado.

## 📂 Estructura de Archivos

```
/
├── index.html              # Formulario de ingreso
├── generar_pdf.php         # Script principal que genera el PDF (solo texto)
├── generar_pdf_con_barras.php # (opcional) Script para generar con código de barras
├── vendor/                 # Dependencias instaladas por Composer
├── composer.json           # Definición de dependencias
└── README.md               # Este archivo
```

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Puedes usarlo, modificarlo y distribuirlo libremente.

## ✍️ Autor

Desarrollado por Mario Luján, como parte de las **Residencias Profesionales** para la carrera de **Ingeniería en Sistemas Computacionales**.
