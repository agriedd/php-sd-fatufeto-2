<template>
	<div>
		<v-app>
			<sidebar-admin/>
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
import SidebarAdmin from '../../sidebar/SidebarAdmin.vue'
export default {
  	components: { ImageViewer, Notification, LogoutAdmin, SidebarAdmin },
}
</script>