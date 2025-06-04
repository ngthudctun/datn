// src/axios.js
import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: '/api', 
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json'
  }
});

// Optional: Gắn token nếu có
axiosInstance.interceptors.request.use(config => {
  const token = localStorage.getItem('token');
  if (token) config.headers.Authorization = `Bearer ${token}`;
  return config;
});

export default axiosInstance;
