// src/assets/js/toast.js
import { reactive, readonly } from "vue";

const state = reactive({
  toasts: [],
});

let id = 0;

export function useToast() {
  const toast = ({ title, message, type = "info", duration = 3000 }) => {
    const newToast = {
      id: id++,
      title,
      message,
      type,
    };
    state.toasts.push(newToast);

    // Auto-remove toast
    setTimeout(() => {
      const index = state.toasts.findIndex(t => t.id === newToast.id);
      if (index !== -1) state.toasts.splice(index, 1);
    }, duration);
  };

  return {
    toasts: readonly(state.toasts),
    toast,
  };
}
