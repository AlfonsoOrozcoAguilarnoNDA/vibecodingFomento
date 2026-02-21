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
* **Origen del Prompt:** Basado en la sesión de diseño en [Gemini App](https://gemini.google.com/app/45dc5a630e105ba5).
* **Contexto:** Proyecto creado para la sección de análisis **"Viernes Social"** de [vibecodingmexico.com](https://vibecodingmexico.com).
* **Stack:** PHP 8.x (Procedural), MariaDB/MySQL, Bootstrap 4.6, FontAwesome 5.

## Seguridad e Integridad
Para garantizar que los datos no sean alterados, el sistema cuenta con un bloqueo de escritura hardcoded. Solo la dirección IP autorizada definida en la tabla `config` puede realizar capturas y evaluaciones. El acceso público es estrictamente de **solo lectura** para fines de auditoría y transparencia social.

---
*Desarrollado en solitario por el Líder del Proyecto con la asistencia técnica de Gemini.*
Alfonso Orozco Aguilar
Licencia MIT
