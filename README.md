# Generador de Etiquetas en PDF para Inventario

Este proyecto permite generar etiquetas en formato PDF a partir de una lista de **códigos internos** o **números de serie**, distribuidas uniformemente en una hoja tamaño **Carta**. Puede incluir o no **códigos de barras** en formato **Code128**. Es ideal para inventariar equipos como impresoras, computadoras y otros activos.

## 📌 Características

- Generación automática de etiquetas a partir de una lista proporcionada por el usuario.
- Salida en PDF con etiquetas distribuidas en:
  - **3 columnas × 9 filas** (27 etiquetas por hoja).
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
├── index.html              # Página principal con enlaces a los generadores
├── index1.php              # Obsoleto o prueba, sin funcionalidad principal
├── index2.php              # Formulario para etiquetas de solo texto
├── index3.php              # Formulario para etiquetas con un solo código de barras (serie) y texto (inventario)
├── generar_pdf.php         # Genera etiquetas con doble código de barras (serie + inventario)
├── generar_pdf2.php        # Genera etiquetas de solo texto, múltiples por página
├── generar_pdf3.php        # Genera etiquetas con código de barras (serie) y texto (inventario)
├── composer.json           # Definición de dependencias PHP (ej. FPDF, Barcode Generator)
├── composer.lock           # Versión exacta de las dependencias instaladas
├── vendor/                 # Dependencias instaladas por Composer
└── README.md               # Documentación del proyecto

```

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Puedes usarlo, modificarlo y distribuirlo libremente.

## ✍️ Autor

Desarrollado por Mario Luján, como parte de las **Residencias Profesionales** para la carrera de **Ingeniería en Sistemas Computacionales**.
