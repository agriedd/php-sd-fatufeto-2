<template>
    <div>
        <v-list v-if="exists" nav>
            <v-list-item>
                <v-list-item-avatar>
                    <v-img :src="user.foto.url" v-if="user.foto"></v-img>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title> {{ user.nama }} </v-list-item-title>
                    <v-list-item-subtitle>{{ user.email }}</v-list-item-subtitle>
                </v-list-item-content>
                <!-- <v-list-item-action>
                    <v-icon>mdi-menu-down</v-icon>
                </v-list-item-action> -->
            </v-list-item>
        </v-list>
        <v-skeleton-loader type="list-item-avatar-two-line" v-else/>
    </div>
</template>
<script>
import { mapState } from 'vuex'
export default {
    computed: {
        ...mapState({
            user: state => state.login.guru.user,
            loading: state => state.login.guru.loading,
        }),
        exists(){
            return this.user && this.user.id_guru
        }
    }
}
</script>