# vibecodingFomento
Sistema de evaluacion de vacantes para una para estatal simulada de fomento al Empleo LATAM.

# Simulador Social de Transparencia - Paraestatal de Fomento al Empleo

## Descripción del Proyecto
Este es un software de **experimento social** diseñado para evaluar la verosimilitud y transparencia de vacantes de empleo reales mediante el juicio de 10 inteligencias artificiales (Analistas). 

El sistema simula un entorno burocrático de una paraestatal donde los analistas operan bajo perfiles específicos para calificar vacantes en dos rondas:
1. **Ronda 1:** Evaluación ciega de la descripción de la vacante.
2. **Ronda 2:** Re-evaluación tras recibir un "Dato Real" proporcionado por el Líder del proyecto.

## Detalles Técnicos del Desarrollo
Este software ha sido desarrollado bajo la metodología de **Vibecoding**, priorizando la fluidez, la intención y la colaboración hombre-máquina.

* **IA Colaboradora:** Gemini 1.5 Flash.
* **Origen del Prompt:** Basado en la sesión de diseño en [Gemini App](https://gemini.google.com/share/6e3b780b7302).
* **Contexto:** Proyecto creado para la sección de análisis **"Viernes Social"** de [vibecodingmexico.com](https://vibecodingmexico.com).
* **Stack:** PHP 8.x (Procedural), MariaDB/MySQL, Bootstrap 4.6, FontAwesome 5.

## Seguridad e Integridad
Para garantizar que los datos no sean alterados, el sistema cuenta con un bloqueo de escritura hardcoded. Solo la dirección IP autorizada definida en la tabla `config` puede realizar capturas y evaluaciones. El acceso público es estrictamente de **solo lectura** para fines de auditoría y transparencia social.

## Prompt Aproximado tomado de conversación Publica ##
Arriba está el link al origen del prompt. https://gemini.google.com/share/6e3b780b7302

Este es un proyecto vibecodingnuevo que harás en solitario. Quizá pienses que en tu entorno hay competencias, no. Este es un software para un experimento SOCIAL de LLM y tú eres el único que hará el código, ok?

El simulador social es el entorno: estamos simulando una arena donde diez inteligencias artificiales realizan una evaluación de puestos para una paraestatal simulada, de fomento al empleo. Se les van a pasar varias vacantes REALES y se espera que evalúen cada vacante en captura manual, de mi parte, en su entorno de LLM. Los resultados que pueden dar son semáforo: verde se publica, amarillo revisar y rojo no por ninguna causa. Van a evaluar un grado de transparencia o verosimilitud de ser legítimo de 1 a 10. Eso es en la primera ronda de evaluación. En la segunda, yo como líder les doy un dato real y les pido que vuelvan a evaluar por segunda vez. Cada LLM sabe que lo hacen otros "empleados" y no hay competencia porque saben que no los evalúan por métricas. Es un ejercicio de transparencia. No generes el código todavía.

Ya tengo definidos los perfiles de usuarios. ¿Te digo lo que pienso de la base de datos?

Va a ser MariaDB MySQL y PHP por replicabilidad. El factor de variabilidad va en la misma vacante. Debe ser un campo LONGTEXT. La trazabilidad y reportes los podemos calcular después. No generes código todavía.

Vamos a mantenerlo simple. Yo copio y pego las respuestas de cada LLM, ligadas a un PDF de control o al link abierto donde se vea que no mentí. Como seguridad, solo si es mi propia dirección IP que yo capturo en el código fuente hardcoded, tiene permiso para capturar evaluaciones y resultados. Es posible que lo ampliemos después. ¿Tiene sentido esto para ti? No generes código. Por cierto, tengo problemas con mi teclado, disculpa la falta de ortografía.

Primero los datos técnicos: este es un proyecto nuevo. Software para un experimento. PHP 8.x procedural, Bootstrap 4.6x, FontAwesome. Las tablas deben ser UTF8, InnoDB, y usar jsDelivr para los CDN. Base de datos creada desde cero con MariaDB.

Sugiero que creemos una tabla nueva llamada config y que allí pueda yo editar la dirección IP. Considera un ancho necesario para IPv4 pero ampliable a IPv6. Esto nos deja con cuatro tablas: config, analistasIA, vacantes, vacantes_evaluaciones. No generes el código.

No quiero que se pueda consultar desde fuera, pero no meter respuestas a las vacantes, que no se bloquee. Solo que avise que no es posible capturar vacantes ni respuestas por no ser una IP autorizada.

Los analistas son 10 pero los he separado en 7 perfiles que ya tengo creados. Sugiero que hagamos una tabla nueva analistas_perfiles, con un campo llave de DOS varchar, porque a veces dos IA tienen el mismo perfil. Para fines prácticos solo afecta en que el analista IA tiene un campo de perfil, y ese se guarda también en vacantes_evaluaciones. No generes el código.

Ok, empiezo a darte los datos de la tabla analistas. Necesitamos campo nombre letra griega, campo que diga IA_LLM, letra perfil, nombre humano, función, traits_personalidad, comentarios y fecha de creación. Todas las fechas deben ser datetime. Considera que todos los números se guarden en decimal(14,6). Traits_personalidad y comentarios deben ser texto, un campo activo varchar(2) default "SI". Los demás a tu criterio. ¿Alguna sugerencia de campo extra? No generes código todavía.

Ok. Te comento que para mí es más importante letra_perfil como segundo campo, porque es integridad de referencia y llave secundaria. Pasa ese campo al segundo lugar.

Sube por favor experimento como tercer campo después de nombre_vacante. Vamos a la tabla que sigue.

Sugiero que creemos una tabla nueva llamada config y que allí pueda yo editar la dirección IP. Considera un ancho necesario para IPv4 pero ampliable a IPv6.

Los perfiles ya están creados. Pasamos a la tabla vacantes. Debe tener un campo automático, un campo nombre_vacante, bolsa_trabajo, link o PDF para vacante, fecha de la vacante, empresa_vacante, campo blob para imagen de vacante, descripción LONGTEXT, comentario LONGTEXT y un campo llamado experimento, varchar(10). Otro campo más para fecha alta con hora, automático. ¿Te parece bien o tienes alguna duda adicional de esta tabla?

El analista en vacantes_evaluacion debe ser el nombre de la letra griega, es la llave. Pon dos campos más a tu análisis: uno es archivo o link (para que de ahí se pueda ver la respuesta y que no mentí) y un comentario_evaluador. ¿Se te ocurre algo más?

Ok, por favor usa un entorno de color empresarial, no modo dark. Necesitamos que además los archivos consideren borrar cache, fijar hora en tiempos de México, y que la barra de navegación y la de footer sean fijos.
---
*Desarrollado en solitario por el Líder del Proyecto con la asistencia técnica de Gemini.*
Alfonso Orozco Aguilar
Licencia MIT
