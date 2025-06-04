// stores/imageSelect.js
import { defineStore } from "pinia";

export const variantcontrollerad = defineStore("variantcontroll", {
    state: () => ({
        
        prfitertrue: [], /* gia tri cua thuoc tinh */
        inputvariant: [], /*  thuoc tinh */
        stepvariant: 1
    }),
    actions: {
        upstepvariant(numvalue) {
            this.stepvariant = numvalue
        }
    },
},
);
