<template>
<v-app>
	<sidebar-admin/>
	<router-view />
	<logout-admin/>
	<image-viewer/>
</v-app>
</template>
<script>
import { mapActions, mapMutations } from 'vuex'
import ImageViewer from './image/ImageViewer.vue';
import LogoutAdmin from './login/LogoutAdmin.vue';
import SidebarAdmin from './sidebar/SidebarAdmin.vue';
export default {
  	components: { 
		LogoutAdmin,
	    SidebarAdmin,
	    ImageViewer 
	},
	created(){

	}
};
</script>