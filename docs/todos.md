# PASOS A SEGUIR

## 1. BASE DE DATOS
1. Crear base de datos del módulo personal.
   1. Crear tablas.
   2. Crear factories.
   3. Crear seeders.
2. Crear base datos modulo de alerta temprana.
   1. Crear tablas.
   2. Crear factories.
   3. Crear seeders.
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
   1. Crear modelos y relaciones.
   1. Crear controladores.
   2. Crear rutas.
   3. Crear vistas.
      1. vista general con todos datos.
      2. vista armas
      3. vista vehículos
      4. vista soldados
      5. vista comandantes
      6. vista tripulaciones
      7. vista de brigadas
      8. Vista general con todos los datos.
   4. Crear todos los cruds.
   5. Crear cliente mqtt 
   6. Exportación importación datos con EXCEL/PDF
   7. Implementar leaflet para visualizaciones avanzadas en mapa.
2. Módulo de alerta temprana.
   1. Crear modelos y relaciones.
   2. Crear controladores.
   3. Crear rutas.
   5. Crear vistas.
      1. vista general con todos datos.
      2. vista objetivos potenciales.
      3. vista puntos estratégicos.
      4. vista de alertas.
   4. Crear cruds manuales de todos ellos.
   5. Bot de telegram para alertas.
   6. Implementar leaflet para visualizaciones avanzadas en mapa.

## 3. API REST
1. Módulo de alerta temprana.
   1. Crear rutas api.
   2. API pública para alertas.
      1. se debe poder hacer consultas generales y además dando posición exacta.
   3. API privada para objetivos y puntos estratégicos.
