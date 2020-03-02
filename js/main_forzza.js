const btnCategoria = document.getElementById('btn-categorias'),
    btnCerrarMenu = document.getElementById('btn-menu-cerrar'),
    grid = document.getElementById('grid'),
    contenedorEnlacesNav = document.querySelector('#menu .contenedor-enlaces-nav'),
    contenedorSubCategorias = document.querySelector('#grid .contenedor-subcategorias'),
    //funcion para validar si nos encontramos en pantalla grande o disposito movil para desplegar menu categoria
    esDispositivoMovil = () => window.innerWidth <= 800; 

btnCategoria.addEventListener('mouseover', () =>  {
    if(!esDispositivoMovil()){
        grid.classList.add('activo'); //mostrar menu al posicionar click sobre btn categoria
    }
    
});

grid.addEventListener('mouseleave', () =>  {
    if(!esDispositivoMovil()){
        grid.classList.remove('activo'); //esconder menu al posicionar fuera del menu
    }
    
});

document.querySelectorAll('#menu .categorias a').forEach((elemento) => {
    elemento.addEventListener('mouseenter', (e) => {
        if (!esDispositivoMovil()) {
        document.querySelectorAll('#menu .subcategoria').forEach((categoria) => {
           categoria.classList.remove('activo');
            if (categoria.dataset.categoria == e.target.dataset.categoria) {
                categoria.classList.add('activo');
                
            }
        });
    
    };

    });
});


//listener para dispositivos moviles
document.querySelector('#btn-menu-barras').addEventListener('click', (e) => {
    e.preventDefault();
    if(contenedorEnlacesNav.classList.contains('activo')){
        contenedorEnlacesNav.classList.remove('activo');
        document.querySelector('body').style.overflow = 'visible';
    }else{
        contenedorEnlacesNav.classList.add('activo');
        document.querySelector('body').style.overflow = 'hidden';
    }
    
});

//click en boton de todas las categorias (version movil)

btnCategoria.addEventListener('click', (e) => {
    e.preventDefault();
    grid.classList.add('activo');
    btnCerrarMenu.classList.add('activo');
});

//boton regresar en menu categorias
document.querySelector('#grid .categorias .btn-regresar').addEventListener('click', (e) => {
    e.preventDefault();
    grid.classList.remove('activo');
    btnCerrarMenu.classList.remove('activo');
});

document.querySelectorAll('#menu .categorias a').forEach((elemento) => {
	elemento.addEventListener('click', (e) => {
		if(esDispositivoMovil()){
			contenedorSubCategorias.classList.add('activo');
			document.querySelectorAll('#menu .subcategoria').forEach((categoria) => {
				categoria.classList.remove('activo');
				if(categoria.dataset.categoria == e.target.dataset.categoria){
					categoria.classList.add('activo');
				}
			});
		}
	});
});

// Boton de regresar en el menu de categorias
document.querySelectorAll('#grid .contenedor-subcategorias .btn-regresar').forEach((boton) => {
	boton.addEventListener('click', (e) => {
		e.preventDefault();
		contenedorSubCategorias.classList.remove('activo');
	});
});

btnCerrarMenu.addEventListener('click', (e)=> {
	e.preventDefault();
	document.querySelectorAll('#menu .activo').forEach((elemento) => {
		elemento.classList.remove('activo');
	});
	document.querySelector('body').style.overflow = 'visible';
});


