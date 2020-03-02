window.sr =  ScrollReveal();
       sr.reveal('.subtitulo', {
           duration: 2000,
           origin:'bottom'
       });

      
    
       window.sr =  ScrollReveal();
       sr.reveal('.caluga-uno', {
           duration: 2000,
           origin:'top',
           distance: '10px' 
       });
    
       window.sr =  ScrollReveal();
       sr.reveal('.sub-contenedor-dos', {
           duration: 1000,
           origin:'top',
           distance: '50px' 
       });
    
       window.sr =  ScrollReveal();
       sr.reveal('.sub-contenedor-tres', {
           duration: 2000,
           origin:'left',
           distance: '100px' 
       });
    

    //Animacion Scroll Footer    
    
       window.sr =  ScrollReveal();
       sr.reveal('.info-texto', {
           duration: 2000,
           origin:'bottom',
           distance: '100px' 
       });
    
    
       window.sr =  ScrollReveal();
       sr.reveal('.info-form', {
           duration: 2000,
           origin:'bottom',
           delay: '1000' 
       });

       sr.reveal('.navegacion-footer', {
           duration: 2000,
           origin:'bottom',
           delay: '1000' 
       });

       sr.reveal('.mapa-ubicacion', {
           duration: 2000,
           origin:'bottom',
           delay: '1000' 
       });

       sr.reveal('.titulo-footer', {
           duration: 2000,
           origin:'top',
           distance: '30px' 
       });

       sr.reveal('.sub-derechos', {
           duration: 2000,
           origin:'top',
           distance: '30px' 
       });

       window.sr =  ScrollReveal();
       sr.reveal('.contenedor-logo-footer', {
           duration: 2000,
           origin:'top',
           distance: '30px' 
	   });

	   window.sr =  ScrollReveal();
       sr.reveal('#hr-img', {
           duration: 2000,
           origin:'bottom',
           delay:'1000'
	   });
	   

	   

       window.sr =  ScrollReveal();
       sr.reveal('.redes-sociales', {
           duration: 2000,
           origin:'bottom',
           distance: '10px' 
       });

       //smoth scrolling, para que la pagina no cambie bruscamente
       document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });