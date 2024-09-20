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


const app = createApp({
  // Puedes pasar opciones adicionales si es necesario
});

// Registrar el componente globalmente
app.component('cuarto-computacion', CuartoComputacion);
app.component('quinto-computacion', QuintoComputacion);
app.component('cuarto-magisterio', CuartoMagisterio);
app.component('quinto-magisterio', QuintoMagisterio);
app.component('sexto-magisterio', SextoMagisterio);
app.component('cuarto-perito', CuartoPerito);
app.component('quinto-perito', QuintoPerito);
app.component('sexto-perito', SextoPerito);
app.component('cuarto-secretariado', CuartoSecretariado);
app.component('quinto-secretariado', QuintoSecretariado);
app.component('sexto-secretariado', SextoSecretariado);







// Montar la aplicación Vue
app.mount('#app');
