<template>
	<div>
		<nav class="d-flex container justify-content-end">
			<li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle text-white mb-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FILTRAR POR TIPO DE INMUEBLE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a
					class="dropdown-item text-white item"
					@click="$emit('listartodos')"
					>
						Todos
					</a>
          <a class="dropdown-item text-white item" href="#"
					v-for="destacada in destacadas"
					v-bind:key="destacada.id"
					@click="$emit('filtro', destacada.slug)"
					>
						{{ destacada.name }} 
					</a>
        </div>
      </li>
		</nav>
	</div>
</template>
<script>
export default {
	name: 'menu-tipo',
	data() {
		return {
			destacadas: [],	
		}
	},
	created(){
		axios.get('api/types')
			.then( respuesta => {
			//console.log(respuesta.data);
			this.destacadas = respuesta.data

			})
			.catch( e => console.log(e))
	},
	methods: {
		seleccionarTipo(destacada) {
			this.destacada = destacada.slug;
			}
		}
}
</script>
<style scoped>
	div {
		background-color: #6272d4;
	}
	li a.item:hover {
		color: #6272d4 !important;
	}
</style>