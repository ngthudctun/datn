// stores/imageSelect.js
import { defineStore } from "pinia";

export const variantcontrollerad = defineStore("variantcontroll", {
    state: () => ({
        
        prfitertrue: [],
        inputvariant: [],
        stepvariant: 1
    }),
    actions: {
        upstepvariant(numvalue) {
            this.stepvariant = numvalue
        }
    },
},
);
