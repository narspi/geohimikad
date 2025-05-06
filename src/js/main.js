document.addEventListener('DOMContentLoaded',()=>{
    const services = document.querySelector('.services');
    if (services) {
        services.addEventListener('click', (event) => {
            const target = event.target;
            if (target.closest('.services__elem-title')) {
                const titleElem = target.closest('.services__elem-title');
                const parent = target.closest('.services__elem')
                const elemDropdown = parent.querySelector('.services__elem-drop');
                elemDropdown.classList.toggle('active');
                titleElem.classList.toggle('active');
            }
        })
    }
});