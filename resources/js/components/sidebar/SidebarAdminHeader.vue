<template>
    <v-list>
        <v-list-item v-if="exists">
            <v-list-item-avatar>
                <v-img src="http://localhost/img/mitchell-orr-_0qSYr-IRbg-unsplash.jpg"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
                <v-list-item-title> {{ user.nama }} </v-list-item-title>
                <v-list-item-subtitle>{{ user.email }}</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-action>
                <v-icon>mdi-menu-down</v-icon>
            </v-list-item-action>
        </v-list-item>
    </v-list>
</template>
<script>
import { mapState } from 'vuex'
export default {
    computed: {
        ...mapState({
            user: state => state.login.admin.user
        }),
        exists(){
            return this.user && this.user.id
        }
    }
}
</script>