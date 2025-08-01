/**
 * Cliente JavaScript para consumir la API de EcoCardenal
 */
class EcoCardenalApiClient {
    constructor(baseUrl = '/api/v1') {
        this.baseUrl = baseUrl;
        this.token = localStorage.getItem('eco_app_token') || null;
    }

    /**
     * Configurar el token de autenticación
     */
    setToken(token) {
        this.token = token;
        localStorage.setItem('eco_app_token', token);
    }

    /**
     * Eliminar el token de autenticación
     */
    clearToken() {
        this.token = null;
        localStorage.removeItem('eco_app_token');
    }

    /**
     * Realizar una solicitud a la API
     */
    async request(endpoint, method = 'GET', data = null) {
        const url = `${this.baseUrl}${endpoint}`;
        
        console.log(`Realizando solicitud ${method} a: ${url}`);
        
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        };
        
        // Intentar obtener el token CSRF si está disponible
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            headers['X-CSRF-TOKEN'] = csrfToken.getAttribute('content');
        }
        
        // Agregar token de autenticación si existe
        if (this.token) {
            headers['Authorization'] = `Bearer ${this.token}`;
        }
        
        const options = {
            method,
            headers
        };
        
        // Agregar cuerpo de la solicitud para métodos POST, PUT, PATCH
        if (['POST', 'PUT', 'PATCH'].includes(method) && data) {
            options.body = JSON.stringify(data);
        }
        
        try {
            const response = await fetch(url, options);
            
            console.log('Respuesta recibida:', response.status);
            
            // Manejar errores HTTP
            if (!response.ok) {
                const errorData = await response.json().catch(() => {
                    return { message: `Error HTTP: ${response.status} ${response.statusText}` };
                });
                throw new Error(errorData.message || 'Error en la solicitud');
            }
            
            return await response.json();
        } catch (error) {
            console.error('Error en la solicitud API:', error);
            throw error;
        }
    }

    // Métodos de autenticación
    
    /**
     * Registrar un nuevo usuario
     */
    async register(userData) {
        const response = await this.request('/auth/register', 'POST', userData);
        
        if (response.success && response.data.access_token) {
            this.setToken(response.data.access_token);
        }
        
        return response;
    }
    
    /**
     * Iniciar sesión
     */
    async login(login, password) {
        const response = await this.request('/auth/login', 'POST', { login, password });
        
        if (response.success && response.data.access_token) {
            this.setToken(response.data.access_token);
        }
        
        return response;
    }
    
    /**
     * Cerrar sesión
     */
    async logout() {
        if (!this.token) {
            return { success: true, message: 'No hay sesión activa' };
        }
        
        const response = await this.request('/auth/logout', 'POST');
        this.clearToken();
        
        return response;
    }
    
    /**
     * Obtener información del usuario actual
     */
    async getMe() {
        return await this.request('/auth/me');
    }
    
    // Métodos para actividades
    
    /**
     * Obtener todas las actividades
     */
    async getActivities() {
        return await this.request('/activities');
    }
    
    /**
     * Obtener detalles de una actividad
     */
    async getActivity(id) {
        return await this.request(`/activities/${id}`);
    }
    
    /**
     * Obtener estadísticas de actividades
     */
    async getActivityStats() {
        return await this.request('/activities/stats');
    }
    
    // Métodos para progreso del usuario
    
    /**
     * Obtener actividades completadas por el usuario
     */
    async getUserActivities() {
        return await this.request('/user/activities');
    }
    
    /**
     * Registrar una actividad completada
     */
    async completeActivity(activityData) {
        return await this.request('/user/activities/complete', 'POST', activityData);
    }
    
    /**
     * Obtener progreso del usuario
     */
    async getUserProgress() {
        return await this.request('/user/progress');
    }
    
    /**
     * Obtener logros del usuario
     */
    async getUserAchievements() {
        return await this.request('/user/achievements');
    }
    
    // Métodos para ranking
    
    /**
     * Obtener ranking global
     */
    async getRanking(limit = 10, page = 1) {
        return await this.request(`/ranking?limit=${limit}&page=${page}`);
    }
    
    /**
     * Obtener top 3 del ranking
     */
    async getTopRanking() {
        return await this.request('/ranking/top');
    }
    
    /**
     * Obtener posición del usuario actual en el ranking
     */
    async getUserRanking() {
        return await this.request('/ranking/me');
    }
    
    // Métodos para análisis de sentimiento
    
    /**
     * Enviar comentario para análisis de sentimiento
     */
    async analyzeSentiment(comment) {
        return await this.request('/sentiment-analysis', 'POST', { comment });
    }
}

// Exportar para uso en módulos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = EcoCardenalApiClient;
}