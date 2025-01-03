# PASOS A SEGUIR

## 1. BASE DE DATOS
1. Crear base de datos del módulo personal. (OK)
   1. Crear tablas. (OK)
   2. Crear factories. (OK)
   3. Crear seeders. (OK)
2. Crear base datos modulo de alerta temprana. (OK)
   1. Crear tablas. (OK)
   2. Crear factories. (OK)
   3. Crear seeders. (OK)
3. Crear base datos modulo de logística.
   1. Crear tablas.
   2. Crear factories.
   3. Crear seeders.
4. Crear base datos modulo de refugios.
   1. Crear tablas.
   2. Crear factories.
   3. Crear seeders.

## 2. APLICACIÓN MONOLÍTICA
1. Módulo de personal.
   1. Crear modelos y relaciones. (OK)
   2. Solucionar problemas carga en pantalla de inicio y estética (OK)
   1. Crear controladores. 
   2. Crear rutas. 
   3. Crear vistas.
      1. vista general con todos datos. (OK)
      2. vista armas (OK)
      3. vista vehículos (OK)
      4. vista soldados (OK)
      5. vista comandantes (OK)
      6. vista tripulaciones
      7. vista de brigadas
   4. Crear todos los cruds.
   5. Crear cliente mqtt 
   6. Exportación importación datos con EXCEL/PDF
   7. Implementar leaflet para visualizaciones avanzadas en mapa.
   8. Cachear tablas (OK)
   9. Mejorar cacheo de bbdd
2. Módulo de alerta temprana.
   1. Crear modelos y relaciones. (OK)
   2. Crear controladores. '''********''' (OK)
   3. Crear rutas. '''********''' (OK)
   5. Crear vistas. (OK)
      1. vista general con todos datos. (OK)
      2. vista objetivos potenciales. (OK)
      3. vista puntos estratégicos. (OK)
      4. vista de alertas. (OK)
   4. Crear cruds manuales de todos ellos. (OK)
   5. Bot de telegram para alertas. (OK)
   6. asignar id de telegram a cada usuario y mejorar mensajes telegram (OK)
   6. Implementar leaflet para visualizaciones avanzadas en mapa. (OK)
   7. Filtros en mapa (OK)
   7. Cachear tablas (OK)
   8. API IMAGENES SATELITE (OK)
   9. MEJORA VISUALIZACION INDEX (OK)
   10. Agregar test a modulo
   11. Hacer pruebas de las busquedas con los scopes
   12. Mejorar la estetica
   13. MQTT para envío de alertas y targets. Tambien recepción de si un target es destruido
3. Agregar componentes tailwind al proyecto. (OK)

## 3. API REST
1. Módulo de alerta temprana. (OK)
   1. Crear rutas api. (OK)
   2. API pública para alertas. (OK)
      1. se debe poder hacer consultas generales y además dando posición exacta. (OK)
      2. Cachear las consultas. (OK)
      3. Crear limitación de uso de la API. (OK)
      4. Crear autenticación de la API por defecto con permisos limitados para pública '''********''' (OK)
   3. API privada para objetivos y puntos estratégicos. '''********''' (OK)
   4. Plantear test de la api
   5. Hacer test de la api
