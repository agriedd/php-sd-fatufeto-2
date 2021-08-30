<template>
	<div>
		<v-app>
			<sidebar-guru/>
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
import SidebarGuru from '../../sidebar/SidebarGuru.vue'
export default {
  	components: { SidebarGuru, ImageViewer, Notification, LogoutAdmin },
}
</script>