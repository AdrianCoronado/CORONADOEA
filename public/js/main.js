const formulariordenes = document.querySelector('#ordenform');

//agregar detalles tabla orden
const detallesform = document.querySelector('#detallesform'),
    detallestable = document.querySelector('#detalles-list tbody');


    //secicon ordenes pendientes boton estatus


    //login
    const loginform = document.querySelector('#loginform');


   //inputsearch = document.querySelector('#buscarhist');
    //buscador 
   inputsearch = document.querySelector('input');


   //boton par aimprimir
   const printorden=document.querySelector('#printbutton');


    const notaform = document.querySelector("#detallenotasform");

    
console.log("uuuu");





eventos();



function eventos() {

    //seccion registro orden    
    formulariordenes ? formulariordenes.addEventListener('submit', registrorden) : '' ;

    //seccion registro de detalles
    detallesform ? detallesform.addEventListener('submit',detallesorden): '';
    //boton para eliminar 
    detallestable ? detallestable.addEventListener('click',erasecontact): '';

    detallestable ? detallestable.addEventListener('click',estatus): '';

    loginform ? loginform.addEventListener('submit',verificaruser): '';

    inputsearch ? searchcontacts() : '';


    //historial ordene simprimir
    printorden ? printorden.addEventListener('click',imprimirorden) : '';




    //notaa registro de conceptos
    notaform ? notaform.addEventListener('submit',detallesorden): '';
    
    


    
    

}

//Registro de orden
function registrorden(e){

    e.preventDefault();
    console.log("entrandoo");
    
    const nombre = document.querySelector('#nombre').value,
    telefono = document.querySelector('#telefono').value,
    marca = document.querySelector('#marca').value,
    modelo = document.querySelector('#modelo').value,
    tipo= document.querySelector('#tipo').value,
    mecanico = document.querySelector('#mecanico').value,
    autorizados = document.querySelector('#autorizados').value,
    accion = document.querySelector('#accion').value;
    accionid = document.querySelector('#accion');

    if(nombre === '' || telefono === '' || marca === '' || modelo === '' ){
        console.log("vacios");
    }else{
        const datos = new FormData();
        datos.append('nombre',nombre);
        datos.append('telefono',telefono);
        datos.append('marca',marca);
        datos.append('modelo',modelo);
        datos.append('mecanico',mecanico);
        datos.append('tipo',tipo);
        datos.append('autorizados',autorizados);
        datos.append('accion',accion);

        //console.log(...datos);
        if(accion == 'crear'){
            console.log("es crear");

            insertarbd(datos);
            document.querySelector('form').reset();
        }else{
              
             const id =accionid.getAttribute('id-d');
             datos.append('id',id);
            console.log(id);

            console.log("nope");

            console.log(...datos);
            updatedatos(datos);

        }
    }
        
        

       
}


function detallesorden(e) {
    e.preventDefault();

      console.log("prevenido");
    const concepto = document.querySelector('#concepto').value,
        cantidad = document.querySelector('#cantidad').value,
        precio = document.querySelector('#precio').value; 
        accion = "creardetalle";

        tipo = document.querySelector('#tipo').value;

        folio = document.querySelector('#foliorden');

        folio ? folio = document.querySelector('#foliorden').value : folio=undefined ;


    
        if(tipo == "nota"){
             
            tipo = "nota";


        }else{

             tipo = "orden";

        }

    if (concepto === '' || cantidad === '' || precio === '')
    {
        console.log("campos vacios");
        //mostrar notificacion
    } else
    //
    {
          imp = parseInt(cantidad) * parseInt(precio);

        console.log( "conc "+ concepto +"-precio " + imp);
        const detallesorden = new FormData();
        detallesorden.append('concepto', concepto);
        detallesorden.append('cantidad', cantidad);
        detallesorden.append('precio', precio);
        if(folio !=undefined){
        detallesorden.append('foliorden', folio);
        }
        detallesorden.append('tipo', tipo);
        detallesorden.append('accion', accion);
        detallesorden.append('total', imp);

        console.log(...detallesorden);

        insertarbd(detallesorden);
        
         document.querySelector('form').reset();

         $(document).ready(function(){

                
            calculaprecio();

           
        });


    }
}

/*
function insertardetalletable(datos) {

    console.log(...datos);
    console.log(datos);

    const nuevoconcepto = document.createElement('tr');


    nuevoconcepto.innerHTML = `
    <td class="align-middle text-center">
    <a class="btn btn-danger" data_id="">X</a>
    </td>

    <td class="align-middle text-center">3</td>
    <td class="align-middle text-center">"Bujes"</td>
    <td class="align-middle text-center">5</td>
    <td class="align-middle text-center">15</td>
    `;



    detallestable.appendChild(nuevoconcepto);

    document.querySelector('form').reset();





}*/


function insertarbd(datos) //detalles orden
{
    const xhr = new XMLHttpRequest();

    xhr.open('POST','modelos/modelo-acciones.php');

    xhr.onload = function(){
        if(this.status=== 200){
             const respuesta = JSON.parse(xhr.responseText);

             console.log(respuesta);

               if (respuesta.accion == 'creardetalle'){

              

                 const nuevoconcepto = document.createElement('tr');
                 parseFloat(respuesta.unitario).toFixed(2);
                 parseFloat(respuesta.total).toFixed(2);

                nuevoconcepto.innerHTML = `
                <td class="align-middle text-center">
                <a class="btn btn-danger" eliminar="${respuesta.lastid}">X</a>
                </td>
                <td class="align-middle text-center">${respuesta.cantidad}</td>
                <td class="align-middle text-center">${respuesta.concepto}</td>
                <td class="align-middle text-center">${parseFloat(respuesta.unitario).toFixed(2)}</td>
                <td class="align-middle text-center" id="total">${parseFloat(respuesta.total).toFixed(2)}</td>
                `;



                  detallestable.appendChild(nuevoconcepto);



                 
             }
        }
    }

    xhr.send(datos);

}

function updatedatos(datos){


    
    const xhr = new XMLHttpRequest();

    xhr.open('POST','modelos/modelo-acciones.php');

    xhr.onload = function(){
        if(this.status=== 200){
             //const respuesta = JSON.parse(xhr.responseText);

             console.log(xhr.responseText);
        }
    }

    xhr.send(datos);




}

//eliminar

function erasecontact(e){
    

   if(e.target.classList.contains('btn-danger')){
        console.log(e.target);

        
       const iddetalle = e.target.getAttribute('eliminar');
        //console.log(iddetalle);

        const data_id = e.target.getAttribute('data_id');
        //console.log(data_id);

        var idd,tipo;

        if(iddetalle == undefined){
            idd = data_id;
            tipo = "orden";
            
        }else{
            idd = iddetalle;
            tipo = "detalle";
        }

  
        console.log(idd);
        console.log(tipo);
       
        const respond = confirm('Deseas eliminar ?');

        if(respond){
        console.log('yeiii');
            
           const xhr = new XMLHttpRequest();
            
          
          xhr.open('GET', `modelos/modelo-acciones.php?id=${idd}&accion=borrar&tipo=${tipo}`, true);

             xhr.onload = function() {
                    if(this.status === 200) {
                        const resultado = JSON.parse(xhr.responseText);
                         console.log(resultado);
                      
                         if(resultado.tipo === 'detalle') {
                              // Eliminar el registro del DOM
                             // console.log(e.target.parentElement.parentElement);
                              e.target.parentElement.parentElement.remove();
                              calculaprecio();

                              // mostrar Notificación
                               // mostrarnotificacion('Contacto eliminado correctamente','correcto');
                                //numeroContactos();   
                         } else {
                              // Mostramos una notificacion
                              //mostrarNotificacion('Hubo un error...', 'error' );
                              console.log("fue una orden");
                                e.target.parentElement.parentElement.remove();
                         }

                    }
               }
            
           xhr.send();
        }
   }
   
}
//recorre las tablas y sus precios para calcular los totales
function calculaprecio(){
       setTimeout(function() {
                    var subtotal=0; 
                    parseFloat(subtotal);

                     $('td').each(function(){
                     if($(this).attr('id') == "total"){
                         
                        subtotal = parseFloat($(this).text() ) + parseFloat(subtotal);
                    console.log($(this).text());

                    console.log(subtotal.toFixed(2));

                    $('#subtotalcant').text("$"+subtotal.toFixed(2));
                    var iva = (subtotal*0.16).toFixed(2);
                    $('#ivacant').text("$" + iva );
                    var total = (subtotal *1.16).toFixed(2);
                    $('#totalcant').text("$" + total );

                }
            });
               
                // 3000 for 3 seconds
            }, 2000);
}

function estatus(e){

     const element = e.target;
    console.log(element);
    if(element.hasAttribute('s-status')){
        console.log("yes");
        
        const estatus = element.getAttribute('s-status');
        const id = element.getAttribute('data_id');
        console.log(estatus);
        console.log(id);

        
        if(estatus == ''){
            element.innerHTML= "En curso"; 
            var estatusdata = "Encurso";   
           // element.classList.add('hola');
            element.setAttribute('s-status',estatusdata);
            //element.parentElement.parentElement.remove();    
        }
      if(estatus == "Encurso"){
            element.innerHTML= "Listo"; 
            var estatusdata = "Listo";  
        }

        if(estatus == "Listo"){
            element.innerHTML= "Pagado"; 
            var estatusdata = "Pagado";  
        }
        const xhr =  new XMLHttpRequest();

        xhr.open('GET',`modelos/modelo-acciones.php?id=${id}&estatus=${estatusdata}&accion=estatus`,true);

        xhr.onload=  function(){
            if(this.status === 200){
                const resultado = JSON.parse(xhr.responseText);
                console.log(resultado);
            
                
                //element.parentElement.innerHTML =resultado.salida;

                if(resultado.estatus == 'Listo'){
                     setTimeout(function(){ 
                element.parentElement.parentElement.remove(); 
                }, 1500);
                }

                 if(resultado.estatus == 'Pagado'){
                     setTimeout(function(){ 
                element.parentElement.parentElement.remove(); 
                }, 1500);
                }



            }

        }

         xhr.send();

         
    }else{
        console.log("nope");
    }

}

function verificaruser(e){
    e.preventDefault();

    const correo = document.querySelector('#email').value,
    contrasena = document.querySelector('#constrasena').value;
    accion = "validar";

    if(correo === '' || contrasena === '' ){
        console.log("vacio");
         const messagediv = document.querySelector('#message');
                const mensaje =`   
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p text-center><strong>Error</strong> Favor de ingresar los datos</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
                messagediv.innerHTML=mensaje;
    }else{
        const datos = new FormData();
        datos.append('email',correo);
        datos.append('contrasena',contrasena);
        datos.append('accion',accion);
         console.log(...datos);

       const xhr = new XMLHttpRequest();

    xhr.open('POST','modelos/modelo-acciones.php');

    xhr.onload = function(){
        if(this.status=== 200){
             const respuesta = JSON.parse(xhr.responseText);

                console.log(respuesta);

              if (respuesta.estado == 'exitoso'){

            

                window.location.href="http://localhost/public_html/app.php";

                 
             }else{
                 console.log("nooo");
                /*const messagediv = document.querySelector('#message');
                const mensaje =`   
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p text-center><strong>Error</strong>, la contraseña o usuario no coinciden .</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
                messagediv.innerHTML=mensaje;*/
             }
        }
    }

    xhr.send(datos);

    }

    console.log("se dio click");
}

/*function busqueda(consulta){
 const xhr =  new XMLHttpRequest();

        xhr.open('POST',`modelos/modelo-acciones.php?accion='buscador'`,true);

        xhr.onload=  function(){
            if(this.status === 200){
                const resultado = JSON.parse(xhr.responseText);
                console.log(resultado);
            
             


            }

        }

         xhr.send();   
    
}*/


function searchcontacts(){
    
   

    const id =inputsearch.id,
    clase =inputsearch.classList[0];
    //buscarlistpago
    //buscarhist
    //buscarpendientes

    if(clase == 'buscador'){

         console.log(inputsearch.id); //id de buscador
    console.log(inputsearch.classList[0]); //clase buscador


$(
    $(document).on('keyup','#'+id,function(){
        
        var valor = $(this).val();
        console.log(valor);
        if(valor != ""){
            buscar(valor,id);
        }else{
            buscar(undefined,id);
            console.log("no tiene valooooor");
        }
    })
    
    );

}else{


}

        
}


function buscar(consulta,idinput){

    const consult= consulta;
     const data = new FormData();

    if(consulta === undefined || idinput === undefined){
        console.log("indeifnidooooo");
          data.append('tabla',idinput);
         data.append('consulta','indefinido');
         data.append('accion','buscador');

    }else{
          data.append('tabla',idinput);
          data.append('consulta',consult);
          data.append('accion','buscador');
    }     

     console.log("consulta ->"+ consult);



  
    


    const xhr =  new XMLHttpRequest();

        xhr.open('POST',`modelos/modelo-acciones.php`,true);

        xhr.onload=  function(){
            if(this.status === 200){
                if(xhr.responseText){
                const resultado = JSON.parse(xhr.responseText);
                console.log(resultado);
                 const x =document.querySelector('div .container .table-responsive');
                 //const x =document.querySelector('div .container .tab .base');
                    x.innerHTML= resultado.query;
                }else{
                    console.log("resultado vacio");
                    
                }


                

              /* if(resultado.estatus == 'exitoso'){



               }else{

               }*/
              
            
             


            }

        }
xhr.send(data);
}




//imprimir hoja historial ordenes
function imprimirorden(){
    console.log("presionadoo");
    //orden-taller
    var printContents = document.getElementById('orden-taller').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;
}