<template>
    <div class="rowspan-6">
        <v-list>
            <v-subheader>
                Kontak
            </v-subheader>
            <v-list-item v-for="(kontakitem, i) in kontaks" :key="i">
                <v-text-field
                    dense
                    outlined
                    v-model="kontakitem.value"
                    :label="`Kontak ${i+1}`"
                    hide-details
                    @keypress.enter.prevent="appendKontak(i)"
                    @keyup="removeKontak(i, $event)"
                    :ref="`kontak${i}`"
                    :placeholder="kontakitem.empty || !i ? kontakitem.message[0] : null"/>
            </v-list-item>
        </v-list>
        <input name="kontak" v-model="kontak" type="hidden">
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        errors: { required: true },
        value: { required: true },
    },
    data(){
        return {
            removeKontakInterval: null,
            kontaks: [],
        }
    },
    computed: {
        value_formated(){

            let kontak = this.value || [{value: "", empty: false, message: ["Tekan Enter Untuk Menambah Kolom Baru"]}]

            kontak = kontak.map(e => {
                if(typeof e == "string")
                    return {value: e, empty: false, message: ["Tekan Enter Untuk Menambah Kolom Baru"]}
                else return e
            })
            return kontak
        },
        item: {
            get(){
                return this.value_formated
            },
            set(val){ 
                console.log(val);
            }
        },
        kontak(){
            return JSON.stringify([...this.kontaks.map(e => e.value)])
        }
    },
    methods: {
        appendKontak(after){
            /**
             * cek jika masih index saat ini kosong maka abaikan
             * 
             */
            if(this.kontaks[after].value.trim().length > 0){
                this.kontaks.splice(after+1, 0, { value: "", empty: false, message: [] })
                this.$nextTick(e => {
                    this.$refs[`kontak${after+1}`][0].focus();
                })
            }
        },
        removeKontak(after, e){
            if(e.key === "Backspace" || e.key === "Delete"){
                /**
                 * cek jika masih index saat ini tidak kosong maka abaikan
                 * 
                 */
                if(this.kontaks[after].value.length <= 0 && this.kontaks.length > 1){
                    if(this.removeKontakInterval && this.kontaks[after].empty){
                        this.kontaks.splice(after, 1)
                        this.$nextTick(e => {
                            let focus_on = after - 1
                            if(focus_on < 0)
                                focus_on = 0
                            this.$refs[`kontak${focus_on}`][0].focus();
                            clearTimeout(this.removeKontakInterval)
                        })
                    } else {
                        this.$set(this.kontaks[after], 'empty', true)
                        this.$set(this.kontaks[after], 'message', ['tekan hapus sekali lagi'])
                        this.removeKontakInterval = setTimeout(()=>{
                            this.kontaks[after].empty = false;
                            this.kontaks[after].message.pop();
                        }, 2000);
                    }
                }
            }
        },
    },
    watch: {

    },
    created(){
        this.$nextTick(e => {
            this.kontaks = this.item
        })
    }
}
</script>
<style lang="scss" scoped>

</style>