import { createApp } from 'vue';
import CuartoComputacion from './components/CuartoComputacion.vue'; 
import QuintoComputacion from './components/QuintoComputacion.vue';
import CuartoMagisterio from './components/CuartoMagisterio.vue';
import QuintoMagisterio from './components/QuintoMagisterio.vue';
import SextoMagisterio from './components/SextoMagisterio.vue';
import CuartoPerito from './components/CuartoPerito.vue';
import QuintoPerito from './components/QuintoPerito.vue';
import SextoPerito from './components/SextoPerito.vue';
import CuartoSecretariado from './components/CuartoSecretariado.vue';
import QuintoSecretariado from './components/QuintoSecretariado.vue';
import SextoSecretariado from './components/SextoSecretariado.vue';
import Imagenes from './components/Imagenes.vue'; 
import Preguntas from './components/Preguntas.vue'; 
import CrearEstudiante from './components/CrearEstudiante.vue'; 
import EditarEstudiante from './components/EditarEstudiante.vue';
import MostrarEstudiante from './components/MostrarEstudiante.vue';
import CrearProfesor from './components/Profesor/CrearProfesor.vue';
import EditarProfesor from './components/Profesor/EditarProfesor.vue';
import MostrarProfesor from './components/Profesor/MostrarProfesor.vue';
import CrearNota from './components/Nota/CrearNota.vue';
import EditarNota from './components/Nota/EditarNota.vue';
import MostrarNota from './components/Nota/MostrarNota.vue';

// Montar para Computación
const appComputacion = createApp({
  data() {
    return {
      mostrarPensum: false, // Estado para controlar la visibilidad del pensum
    };
  },
});

appComputacion.component('cuarto-computacion', CuartoComputacion);
appComputacion.component('quinto-computacion', QuintoComputacion);
appComputacion.mount('#computacion');





// Montar para Perito
const appPerito = createApp({
  data() {
    return {
      mostrarPensum1: false, // Estado para controlar la visibilidad del pensum
    };
  },
});

appPerito.component('cuarto-perito', CuartoPerito);
appPerito.component('quinto-perito', QuintoPerito);
appPerito.component('sexto-perito', SextoPerito);
appPerito.mount('#perito-content');




  // Montar para Magisterio
const appMagisterio = createApp({
  data() {
    return {
      mostrarPensum2: false, // Estado para controlar la visibilidad del pensum
    };
  },
});
appMagisterio.component('cuarto-magisterio', CuartoMagisterio);
appMagisterio.component('quinto-magisterio', QuintoMagisterio);
appMagisterio.component('sexto-magisterio', SextoMagisterio);
appMagisterio.mount('#magisterio-content');






// Montar para Secretariado
const appSecretariado = createApp({
  data() {
    return {
      mostrarPensum3: false, // Estado para controlar la visibilidad del pensum
    };
  },
});
appSecretariado.component('cuarto-secretariado', CuartoSecretariado);
appSecretariado.component('quinto-secretariado', QuintoSecretariado);
appSecretariado.component('sexto-secretariado', SextoSecretariado);
appSecretariado.mount('#secretariado-content');



// Montar para imagenes
const appImagenes = createApp({});
appImagenes.component('imagenes', Imagenes);
appImagenes.mount('#imagenes-content');



//Montar el componente de preguntas
const appPreguntas = createApp({});
appPreguntas.component('preguntas', Preguntas);
appPreguntas.mount('#preguntas-component'); 


const appEstudiantes = createApp({});
appEstudiantes.component('crear-estudiante', CrearEstudiante);
appEstudiantes.component('editar-estudiante', EditarEstudiante);
appEstudiantes.component('mostrar-estudiante', MostrarEstudiante);

// Montar la aplicación en el div correspondiente para cada componente
appEstudiantes.mount('#estudiantes-content');



// Crear la aplicación para profesores
const appProfesores = createApp({});

// Registrar los componentes de profesores
appProfesores.component('crear-profesor', CrearProfesor);
appProfesores.component('editar-profesor', EditarProfesor);
appProfesores.component('mostrar-profesor', MostrarProfesor);

// Montar la aplicación en el div correspondiente para cada componente
appProfesores.mount('#profesores-content');


// Crear la aplicación para notas
const appNotas = createApp({});

// Registrar los componentes de notas
appNotas.component('crear-nota', CrearNota);
appNotas.component('editar-nota', EditarNota);
appNotas.component('mostrar-nota', MostrarNota);

// Montar la aplicación en el div correspondiente para cada componente
appNotas.mount('#notas-content');
