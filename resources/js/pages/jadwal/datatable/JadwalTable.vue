<template>
    <v-data-table
        :headers="headers"
        :items="items"
        :options.sync="mOptions"
        :server-items-length="total"
        :loading="loading"
        @update:options="update($event)"
        fixed-header
        :footer-props="{'items-per-page-options':[5, 10, 20, 30, 50, 100]}"
        :item-class="(item)=>{ return `hover-activator ${ item.id == currentId ? ' ' : null }` }"
        :show-select="!noSelect"
        single-select
        v-model="selected"
        :mobile-breakpoint="0">
        <template #item.id_kelas="{item}">
            <div v-if="item.kelas.length">
                <div v-for="kelas in item.kelas">
                    {{ kelas.nama }}
                </div>
            </div>
        </template>
        <template #item.jumlah="{item}">
            {{ item.jumlah | number }}
        </template>
        <template #item.waktu_mulai="{item}">
            {{ item.waktu_mulai | time }}
        </template>
        <template #item.waktu_berakhir="{item}">
            {{ item.waktu_berakhir | time }}
        </template>
        <template #item.action="{item}">
            <template v-if="!isPimpinan">
                <div>
                    <v-slide-x-transition mode="out-in">
                        <v-card
                            :key="item.id == currentId"
                            flat
                            rounded="pill"
                            class="pa-1 my-2 d-flex shadow flex-no-wrap justify-center"
                            dark>
                            <v-btn icon color="error darken-1" @click="deleteRow(item)">
                                <v-icon small>mdi-delete</v-icon>
                            </v-btn>
                            <v-btn icon @click="editRow(item)">
                                <v-icon small>mdi-pencil</v-icon>
                            </v-btn>
                        </v-card>
                    </v-slide-x-transition>
                </div>
            </template>
        </template>
    </v-data-table>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    props: {
        headers: Array,
        items: Array,
        options: Object,
        total: Number,
        loading: Boolean,
        currentId: Number|String,
        value: Array,
        small: Boolean,
        noSelect: Boolean,
    },
    computed: {
        mOptions: {
            get(){ return this.options },
            set(val){ this.$emit('update:options', val) }
        },
        selected: {
            get(){ return this.value },
            set(val){ this.$emit('input', val) }
        },
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    },
    methods: {
        update(e){
            this.$emit('update', e)
        },
        rowClick(e){
            this.$emit('rowClick', e)
        },
        editRow(e){
            this.$emit('editRow', e)
        },
        deleteRow(e){
            this.$emit('deleteRow', e)
        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
    },
    filters: {
        sub(val, len){
            if(val)
                return val.substr(0, len);
            return null
        },
    },
}
</script>
<style lang="scss" scoped>
    .hover-activator{
        &:hover{
            & .hover-default{
                display: none;
            }
            & .hover-target{
                display: block;
            }
        } 
        .hover-target{
            display: none;
        }
    }
</style>