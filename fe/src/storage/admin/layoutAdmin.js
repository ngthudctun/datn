import { defineStore } from "pinia";
export const AdminLayout = defineStore("adminlayout", {

    state: () => ({

    }),
    actions: {

        getadminorder() {
            try {
                const button = document.querySelector(".active-sidebar");
                const sidebar = document.querySelector("#sidebarch");
                if (sidebar.classList.contains("d-none")) {
                    sidebar.classList.remove("d-none");

                } else {
                    /*  sidebar.classList.add("d-none") */
                    sidebar.classList.add("animation-out");
                    setTimeout(function () {
                        sidebar.classList.remove("animation-out");
                        sidebar.classList.add("d-none");
                    }, 1000);

                }
            } catch (error) {

            }
        },
    }
});
