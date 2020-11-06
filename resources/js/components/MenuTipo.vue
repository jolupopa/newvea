<template>
	<div>
		<div class="d-flex container justify-content-between">
			<span 
			v-for="destacada in destacadas"
			v-bind:key="destacada.id"
			class="text-white py-3 mx-2 btn"
			@click="$emit('filtro', destacada.slug)"
			>
				{{ destacada.name }} 
			</span>
		</div>
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
			//console.log(C);
			// this.destacada = destacada.slug;
			//this.tipo = destacada.slug
			//this.window.location.href = producturl
		

			}
		}

}
	

</script>
<style scoped>
div {
  background-color: #6272d4;
}


</style>