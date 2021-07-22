<template>
<v-app>
	<sidebar-admin/>
	<router-view />
	<logout-admin/>
</v-app>
</template>
<script>
import { mapActions, mapMutations } from 'vuex'
import LogoutAdmin from './login/LogoutAdmin.vue';
import SidebarAdmin from './sidebar/SidebarAdmin.vue';
export default {
  	components: { 
		LogoutAdmin,
	    SidebarAdmin 
	},
	created(){

	}
};
</script>