import { defineStore } from "pinia";
import "@/assets/css/toast.css";
export const useShowtoast = defineStore("Showtoast", {
    state: () => ({

    }),
    actions: {
        toast({ title = "", message = "", type = "info", duration = 3000 }) {
            const main = document.getElementById("toastbox");

            if (main) {
                const toast = document.createElement("div");

                const autoRemoveId = setTimeout(() => {
                    if (main.contains(toast)) {
                        main.removeChild(toast);
                    }
                }, duration + 1000);

                toast.onclick = (e) => {
                    if (e.target.closest(".toast__close")) {
                        if (main.contains(toast)) {
                            main.removeChild(toast);
                            clearTimeout(autoRemoveId);
                        }
                    }
                };

                const icons = {
                    success: "fas fa-check-circle",
                    info: "fas fa-info-circle",
                    warning: "fas fa-exclamation-circle",
                    error: "fas fa-exclamation-circle",
                };
                const colors = {
                    success: "#28a745",
                    info: "#17a2b8",
                    warning: "#ffc107",
                    error: "#dc3545",
                };

                const icon = icons[type] || icons.info;
                const progressColor = colors[type] || colors.info;
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add("toastmain", `toast--${type}`, "mb-2");
                toast.style.animation = `slideInLeft ease 0.3s, slideOutRight linear 0.5s ${delay}s forwards`;

                // Tạo thanh progress riêng
                const progress = document.createElement("div");
                progress.classList.add("toast__progress");
                progress.style.backgroundColor = progressColor;
                progress.style.animationDuration = `${duration}ms`; // thời gian chạy

                toast.innerHTML = `
      <div class="toast__icon">
        <i class="${icon}"></i>
      </div>
      <div class="toast__body">
        <h3 class="toast__title">${title}</h3>
        <p class="toast__msg">${message}</p>
      </div>
      <div class="toast__close">
        <i class="fas fa-times"></i>
      </div>
    `;
                toast.appendChild(progress); // thêm thanh tiến trình vào cuối

                main.appendChild(toast);
            }
        }

    },
});
