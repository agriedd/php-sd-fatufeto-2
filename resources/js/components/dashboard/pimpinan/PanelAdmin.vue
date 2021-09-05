<template>
	<div>
		<v-app>
			<sidebar-pimpinan/>
			<router-view />
			<logout-admin/>
			<image-viewer/>
			<notification/>
		</v-app>
	</div>
</template>
<script>
import ImageViewer from '../../image/ImageViewer.vue'
import LogoutAdmin from '../../login/LogoutAdmin.vue'
import Notification from '../../notification/Notification.vue'
import SidebarPimpinan from '../../sidebar/SidebarPimpinan.vue'
export default {
  	components: { ImageViewer, Notification, LogoutAdmin, SidebarPimpinan },
}
</script>