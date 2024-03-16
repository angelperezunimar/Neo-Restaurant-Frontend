function productList(){
    if (localStorage.getItem('token')){
        getProductList();
    }else{
        alert('Ha expirado la sesión');
        window.location.href='../../views/Auth/login.php'
    }
}
const getProductList = async()=> {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/products/list', {
            method: 'GET',
            headers: {
                "Authorization": "Bearer " + localStorage.getItem('token')
            }
        })
        if (response.ok) {
            const datas = await response.json();
            let body=''
            let classSpan=''
            let idProduct=0
            for (let i=0; i< Object.keys(datas.data).length;i++){
                if (datas.data[i]){
                if (datas.data[i].status === 'Disponible'){
                    classSpan='class="badge bg-label-success me-1"'
                }else{
                    classSpan='class="badge bg-label-warning me-1"'
                }
                idProduct=datas.data[i].id
                body+=`<tr id="${idProduct}">
                        <td>
                            ${datas.data[i].name}
                        </td>
                        <td style="white-space: pre-wrap">
                            ${datas.data[i].description}
                        </td>
                        <td>
                            ${datas.data[i].amount}
                        </td>
                        <td>
                            ${datas.data[i].category}
                        </td>
                        <td> 
                        <span ${classSpan}>
                            ${datas.data[i].status}
                        </span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <img src="/NeoRestaurante/public/vendor/libs/js/fontawesome-free-6.5.1-web/svgs/solid/ellipsis-vertical.svg" alt="" style="width: 20px; height:20px;">
                            </button>
                            <div class="dropdown-menu">
                            <button class="dropdown-item btn btn-outline-secondary" id="edit" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalCenter" >
                                <img src="/NeoRestaurante/public/vendor/libs/js/fontawesome-free-6.5.1-web/svgs/solid/file-pen.svg" style="width: 15px; heigth: 15px;" alt="" > Editar</button>
                              <button class="dropdown-item btn btn-outline-secondary"  id="delete" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="javascript:void(0);" >
                                <img src="/NeoRestaurante/public/vendor/libs/js/fontawesome-free-6.5.1-web/svgs/solid/trash.svg" style="width: 15px; heigth: 15px;" alt="" > Eliminar producto</button>
                            </div>
                          </div>
                        </td>
                    </tr>`;
            }
            }
            document.getElementById('inf-body').innerHTML=body
        }else if(response.status===401){
            alert('No autorizado');
            window.location.href='/NeoRestaurante/'
        }else if(response.status===500){
            localStorage.removeItem('token')
            alert('Ha expirado la sesión');
            window.location.href='/NeoRestaurante/views/Auth/login.php'
        }
    } catch (error) {
        console.log(error)
    }
}
const tableBody = document.getElementById("inf-body");
tableBody.addEventListener("click", (event) => {
    const target = event.target;
    const row = target.closest("tr");
    const elementId = row.getAttribute("id");
    if (target.getAttribute('id')==='edit'){
        getProduct(elementId)
    }else if(target.getAttribute('id')==='delete'){
        document.getElementById('borrar').name=elementId
    }
});
function sendProductDelete(){
    productDelete()
}
const productDelete = async()=> {
    try{
        const response = await fetch('http://127.0.0.1:8000/api/delete/product/'+document.getElementById('borrar').name, {
            method: 'POST',
            headers:{
                "Authorization": "Bearer " + localStorage.getItem('token')
            }
        })
        if (response.ok) {
            alert('Producto Eliminado satisfactoriamente')
            location.reload()
        }
    } catch (error){
        console.log(error)
    }
}
const getProduct = async(id)=> {
    try{
        const response = await fetch('http://127.0.0.1:8000/api/product/'+id, {
            method: 'GET',
            headers:{
                "Authorization": "Bearer " + localStorage.getItem('token')
            }
        })
        if (response.ok) {
            const datas = await response.json();
            document.getElementById('nombre').value=datas.data.name
            document.getElementById('descripcion').value=datas.data.description
            document.getElementById('precio').value=datas.data.amount
            document.getElementById('categoria').value=datas.data.category
            document.getElementById('dropdownMenuButton').value = datas.data.status
            document.getElementById('send').name =  datas.data.id
        }
    } catch (error){
        console.log(error)
    }
    
}
function editProduct(){
    sendEditProduct()
}
const sendEditProduct = async()=> {
    try{
        var formulario = document.getElementById('formulario')
        var data = new FormData(formulario);
        const foto = document.getElementById('upload').files[0]
        const formdata= new FormData()
        formdata.append('image',foto,foto.name)
        const file = URL.createObjectURL(foto)
        document.getElementById('uploadedAvatar').setAttribute('src',file)
        let status =0;
        if (data.get('estado')==='Disponible'){
            status=1
        }else {
            status=2
        }
        const inf ={
            name: data.get('nombre'),
            description: data.get('descripcion'),
            amount:      data.get('precio'),
            status_id:   status,
            category:    data.get('categoria'),
        }
        const response = await fetch('http://127.0.0.1:8000/api/edit/product/'+document.getElementById('send').name, {
            method: 'POST',
            headers:{
                'Content-Type': 'application/json',
                "Authorization": "Bearer " + localStorage.getItem('token'),
            },
            body: JSON.stringify(inf)
        })
        if (response.ok) {
            $.ajax()
            const upfile = await fetch('http://127.0.0.1:8000/api/image/product/'+document.getElementById('send').name, {
                method: 'POST',
                headers:{
                    "Authorization": "Bearer " + localStorage.getItem('token'),
                },
                body: formdata
            })
            if (upfile.ok){
                const datas2 = await upfile.json();
                alert(datas2.title)
                location.reload();
            }else if (upfile.status===413){
                alert('El archivo es muy pesado')
            }else {
                const datas2 = await upfile.json();
                alert(datas2.title)
            }
        }else {
            const datas1 = await response.json();
            alert(datas1.title)
        }
    } catch (error){
        console.log(error)
    }
}
function createProduct(){
    sendCreateProduct()
}
const sendCreateProduct = async()=> {
    try{
        var formulario = document.getElementById('formulario2')
        var data = new FormData(formulario);
        let status =0;
        if (data.get('estado')==='Disponible'){
            status=1
        }else {
            status=2
        }
        const inf ={
            name: data.get('nombre'),
            description: data.get('descripcion'),
            amount:      data.get('precio'),
            status_id:    status,
            category:     data.get('categoria'),
        }
        const response = await fetch('http://127.0.0.1:8000/api/create/product/', {
            method: 'POST',
            headers:{
                'Content-Type': 'application/json',
                "Authorization": "Bearer " + localStorage.getItem('token'),
            },
            body: JSON.stringify(inf),
        })
        if (response.ok) {
            alert('Producto Ha Sido Creado Satisfactoriamente')
            location.reload();
        }
    } catch (error){
        console.log(error)
    }
}
function subirArchivo(){
    console.log('click')
        const formData = new FormData();
        formData.append('archivo', document.getElementById('subir').files[0]);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../vendor/php/upload.php');
        xhr.setRequestHeader('enctype', 'multipart/form-data');
        xhr.send(formData);
}