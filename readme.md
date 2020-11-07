Requerimientos:

- Tiene que ser en Bootstrap (responsive)
- Debe tener un modal con politicas de privacidad (colocar cualquier texto).
- A los pocos segundos de visitar el sitio, debe aparecer un banner/pop up con un botón de aceptar cookies.
- El formulario debe insertar datos en una DB
- Campos del formulario: nombre, apellido, e-mail. El e-mail debe tener un validador @
 
Luego de enviar el formulario, debe redirigir a una web: gracias_mx.html, gracias_es.html, o gracias_pe.html" según el país en el que se encuentra el usuario que completa el formulario ( según el IP del visitante)

Desarrollo: 

Se uso bootstrap y jquery 

- El modal se abre con el enlace de politicas privacidad

- El banner de cookies aparece a los 2 segundo se puede cambiar el archivo js/cookerbanner.js
    También se puede configurar la duración de la cookie 
    ahora esta configurad en 0 dias para que siempre aparezca el banner
    si se cambia la configuración solo aparecera al vencer el baner o limpar los datos de navegación.

- Los datos del formulario son procesados en el archivo guardar-data.php este a su vez carga una clase que se encarga de la conexion a la base de datos mysql (editar para cambiar datos de conexion) y de sanitizar los datos para luego guardarlos los datos en una tabla llamada "persona" 

- El campo email esta validado con html5 para que tenga el formato correcto y con la clasula unique en la base de datos para evitar registros repetidos.

- En el archivo guardar-data.php hay 2 funciones una para obtener el ip del usuario que se registra y la otra para determinar el origen del dicha ip si el pais es España (ES) , México (MX) o Perú (PE) es redirido a los archivos correspondiente gracias_xx,hml si no corresponde a ninguno de estos paises se va a gracias.html

- si sucede un error al guardar el base de datos se va al archivo error.htm

se puede ver ejecutandose en http://alquilahosting.info/test