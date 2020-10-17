<template>
	<div>
			<span class="like-btn" @click="likeProperty" :class="{ 'like-active' : isActive }"></span>
			<p> A {{ cantidadLikes}} Les gustó esta propiedad </p>
	</div>
</template>	

<script>
export default {
	props: ['propertyId', 'like', 'likes' ],
	data: function() {
		return {
			isActive: this.like,
			totalLikes: this.likes
		}
	},
	methods: {
		likeProperty() {
			//	console.log('componente');

			axios({
				method: 'post',
				url: '/admin/properties/' + this.propertyId ,  baseURL: 'https://veaweb.dev' })
				.then( respuesta => {
					//	console.log(respuesta)
					if(respuesta.data.attached.length > 0 ) {
						this.$data.totalLikes++;
					} else {
							this.$data.totalLikes--;
					}

					this.isActive = !this.isActive;
					
				})
				.catch( error => {
					//console.log(error)
					let txt;
					let r = confirm("Neceststas estar autenticado, Deseas ir a registrarte!");
					if (r == true) {
					 		window.location = '/register';
					} else {
							window.location.reload();
					}
				
				});
		
		}
	},
	computed: {
		cantidadLikes: function() {
				return this.totalLikes;
		}
	}
}
</script>