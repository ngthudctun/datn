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



        myFunction(idinput, idul) {
            console.log(1);
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById(idinput);
            filter = input.value.toUpperCase();
            ul = document.getElementById(idul);
            li = ul.getElementsByTagName("li");
            console.log(ul)
            console.log(input)
            if (ul.classList.contains("d-none")) {
                ul.classList.remove("d-none");
                ul.classList.add("d-block");
            }

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {

                a = li[i].querySelector("a") || li[i].querySelector(".box-con");
                if (!a) continue; 

                txtValue = a.textContent || a.innerText;
             

                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].classList.add("show-menu-drop");


                } else {
                    li[i].classList.remove("show-menu-drop");
                }

            }

            document.addEventListener("click", function (event) {
                const input = document.getElementById(idinput);
                const ul = document.getElementById(idul);
                if (!input.contains(event.target) && !ul.contains(event.target)) {
                    ul.classList.remove("d-block");
                    ul.classList.add("d-none");
                }
            },)
        }

    }
});
