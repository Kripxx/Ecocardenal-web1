/**
 * API Tester - Script para interactuar con la API de EcoCardenal
 * Guardar este archivo como public/js/api-tester.js
 */
document.addEventListener('DOMContentLoaded', function() {
    // Comprobar si el cliente de API está disponible
    if (typeof EcoCardenalApiClient === 'undefined') {
        console.error('Error: EcoCardenalApiClient no está definido. Verifica que api-client.js está cargado correctamente.');
        alert('Error: No se pudo cargar el cliente de API. Por favor, verifica que api-client.js está disponible.');
        return;
    }
    
    // Inicializar el cliente de API
    const apiClient = new EcoCardenalApiClient('/api/v1');
    console.log("API Client inicializado correctamente");
    
    // Referencias a elementos del DOM
    const methodSelect = document.getElementById('api-method');
    const endpointInput = document.getElementById('api-endpoint');
    const requestDataTextarea = document.getElementById('request-data');
    const sendRequestBtn = document.getElementById('send-request');
    const responseContainer = document.getElementById('response-container');
    const responseStatus = document.getElementById('response-status');
    const responseData = document.getElementById('response-data');
    
    // Función para actualizar la UI según el método seleccionado
    function updateUI() {
        const method = methodSelect.value;
        if (['POST', 'PUT', 'PATCH'].includes(method)) {
            requestDataTextarea.parentElement.style.display = 'block';
        } else {
            requestDataTextarea.parentElement.style.display = 'none';
        }
    }
    
    // Actualizar la UI cuando cambie el método
    methodSelect.addEventListener('change', updateUI);
    
    // Inicializar UI
    updateUI();
    
    // Manejar el envío de solicitudes
    sendRequestBtn.addEventListener('click', async function() {
        try {
            // Mostrar spinner de carga o indicador
            responseContainer.style.display = 'block';
            responseData.innerHTML = '<div class="text-center p-3">Cargando...</div>';
            
            const method = methodSelect.value;
            const endpoint = endpointInput.value;
            
            // Preparar datos para la solicitud
            let requestData = null;
            if (['POST', 'PUT', 'PATCH'].includes(method) && requestDataTextarea.value.trim()) {
                try {
                    requestData = JSON.parse(requestDataTextarea.value);
                } catch (error) {
                    throw new Error('Error al analizar JSON: ' + error.message);
                }
            }
            
            console.log(`Enviando solicitud ${method} a ${endpoint}`);
            console.log('Datos:', requestData);
            
            // Enviar la solicitud
            const response = await apiClient.request(endpoint, method, requestData);
            
            // Mostrar la respuesta
            responseStatus.textContent = 'Exitoso';
            responseStatus.className = 'badge bg-success';
            responseData.textContent = JSON.stringify(response, null, 2);
            
        } catch (error) {
            console.error('Error en la solicitud:', error);
            
            // Mostrar error en la interfaz
            responseStatus.textContent = 'Error';
            responseStatus.className = 'badge bg-danger';
            responseData.textContent = error.message || 'Error desconocido';
        }
    });
    
    // Ejemplos rápidos
    const exampleButtons = document.querySelectorAll('.example-request');
    exampleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const method = this.getAttribute('data-method');
            const endpoint = this.getAttribute('data-endpoint');
            const data = this.getAttribute('data-body');
            
            methodSelect.value = method;
            endpointInput.value = endpoint;
            
            if (data) {
                requestDataTextarea.value = data;
            } else {
                requestDataTextarea.value = '';
            }
            
            updateUI();
        });
    });
});