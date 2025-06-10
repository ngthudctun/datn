// src/axios.js
import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // để phù hợp khi dev
  // withCredentials: true,
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  }
});

// Interceptor để tự động thêm token Bearer
axiosInstance.interceptors.request.use(config => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
}, error => Promise.reject(error));

export default axiosInstance;
