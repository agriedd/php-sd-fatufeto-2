<template>
    <div class="rowspan-6">
        <v-list>
            <v-subheader>
                Visi
            </v-subheader>
            <v-list-item v-for="(visi, i) in visis" :key="i">
                <v-text-field
                    dense
                    outlined
                    v-model="visi.value"
                    :label="`Visi ${i+1}`"
                    hide-details
                    @keypress.enter.prevent="appendVisi(i)"
                    @keyup="removeVisi(i, $event)"
                    :ref="`visi${i}`"
                    :placeholder="visi.empty || !i ? visi.message[0] : null"/>
            </v-list-item>
            <v-subheader>
                Misi
            </v-subheader>
            <v-list-item v-for="(misi, i) in misis" :key="`misi${i}`">
                <v-text-field
                    dense
                    outlined
                    v-model="misi.value"
                    :label="`Misi ${i+1}`"
                    @keypress.enter.prevent="appendMisi(i)"
                    @keyup="removeMisi(i, $event)"
                    hide-details
                    :ref="`misi${i}`"
                    :placeholder="misi.empty || !i ? misi.message[0] : null"/>
            </v-list-item>
        </v-list>
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
            visis: [
                {value: "", empty: false, message: ["Tekan Enter Untuk Menambah Kolom Baru"]},
            ],
            misis: [
                {value: "", empty: false, message: ["Tekan Enter Untuk Menambah Kolom Baru"]},
            ],
            removeVisiTransition: null,
            removeMisiTransition: null
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){ this.$emit('input', val) }
        },
    },
    methods: {
        appendVisi(after){
            /**
             * cek jika masih index saat ini kosong maka abaikan
             * 
             */
            if(this.visis[after].value.trim().length > 0){
                this.visis.splice(after+1, 0, { value: "", empty: false, message: [] })
                this.$nextTick(e => {
                    this.$refs[`visi${after+1}`][0].focus();
                })
            }
        },
        removeVisi(after, e){
            if(e.key === "Backspace" || e.key === "Delete"){
                /**
                 * cek jika masih index saat ini tidak kosong maka abaikan
                 * 
                 */
                if(this.visis[after].value.length <= 0 && this.visis.length > 1){
                    if(this.removeVisiTransition && this.visis[after].empty){
                        this.visis.splice(after, 1)
                        this.$nextTick(e => {
                            let focus_on = after - 1
                            if(focus_on < 0){
                                focus_on = 0
                            }
                            this.$refs[`visi${focus_on}`][0].focus();
                        })
                    } else {
                        this.visis[after].empty = true;
                        this.visis[after].message = ['tekan hapus sekali lagi'];
                        this.removeVisiTransition = setTimeout(()=>{
                            this.visis[after].empty = false;
                            this.visis[after].message.pop();
                        }, 2000);
                    }
                }
            }
        },
        appendMisi(after){
            /**
             * cek jika masih index saat ini kosong maka abaikan
             * 
             */
            if(this.misis[after].value.trim().length > 0){
                this.misis.splice(after+1, 0, { value: "", empty: false, message: [] })
                this.$nextTick(e => {
                    this.$refs[`misi${after+1}`][0].focus();
                })
            }
        },
        removeMisi(after, e){
            if(e.key === "Backspace" || e.key === "Delete"){
                /**
                 * cek jika masih index saat ini tidak kosong maka abaikan
                 * 
                 */
                if(this.misis[after].value.length <= 0 && this.misis.length > 1){
                    if(this.removeMisiTransition && this.misis[after].empty){
                        this.misis.splice(after, 1)
                        this.$nextTick(e => {
                            let focus_on = after - 1
                            if(focus_on < 0){
                                focus_on = 0
                            }
                            this.$refs[`misi${focus_on}`][0].focus();
                        })
                    } else {
                        this.misis[after].empty = true;
                        this.misis[after].message = ['tekan hapus sekali lagi'];
                        this.removeMisiTransition = setTimeout(()=>{
                            this.misis[after].empty = false;
                            this.misis[after].message.pop();
                        }, 2000);
                    }
                }
            }
        }
    },
    watch: {
    }
}
</script>
<style lang="scss" scoped>

</style>