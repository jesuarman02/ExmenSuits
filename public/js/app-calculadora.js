document.addEventListener('DOMContentLoaded', function() {
    const resultadoElement = document.getElementById('resultado');
    const resultado = resultadoElement.getAttribute('data-result');
    const error = resultadoElement.getAttribute('data-error');
    
    if (resultado) {
        Swal.fire({
            text: resultado,
            timer: 10000,
            timerProgressBar: true,
            willClose: () => {
                // Remove the data attributes to reset the state
                resultadoElement.removeAttribute('data-result');
                resultadoElement.removeAttribute('data-error');
            }
        });
    } else if (error) {
        Swal.fire({
            icon: 'error',
            text: error,
            timer: 10000,
            timerProgressBar: true,
            willClose: () => {
                // Remove the data attributes to reset the state
                resultadoElement.removeAttribute('data-result');
                resultadoElement.removeAttribute('data-error');
            }
        });
    }
});