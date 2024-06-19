<script setup>

    import axios from 'axios';
    import { ref, onMounted, watch   } from 'vue';
    import {sendRequest,confirmation,show_alert} from '../../../utils/functions';
    import Swal from 'sweetalert2';
/**********************************************************/
/**********************************************************/
    import DataTable from 'datatables.net-vue3';
    import 'datatables.net-dt/css/dataTables.dataTables.css';
    import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
    import 'datatables.net-buttons/js/buttons.print';
    import 'datatables.net-responsive-dt';
    import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';
    import JsZip  from 'jszip';
    import  pdfMake from 'pdfMake/build/pdfmake';
    import * as pdfFonts from 'pdfMake/build/vfs_fonts';
    import Button from '@/Components/Button.vue';

/***********************************************************/
/**********************************************************/
    import AdminLayout from "@/Layouts/AdminLayout.vue";
    window.JSZip=JSZip;
    import Select from 'datatables.net-select';
    import JSZip from 'jszip';
    pdfMake.vfs = pdfFonts.pdfMake? pdfFonts.pdfMake.vfs:pdfMake.vfs;
/**************************************************************************************************************** */
/**************************************************************************************************************** */
/**************************************************************************************************************** */


    const props = defineProps({
    personas: Array,
    });

    const table=ref();
    const columns =ref([]);
    const buttons = ref([]);
    const personas = ref([]);
    const load = ref(false);
    const showModal = ref(false); // Variable para controlar la visibilidad del modal
    const modalTitle = ref(''); 
    const showModalEdit = ref(false); // Variable para controlar la visibilidad del modal
    const modalTitleEdit = ref(''); // Variable para almacenar el título del modal
    const filaSeleccionada = ref(false);

/**************************************************************************************************************** */
/**************************************************************************************************************** */

onMounted(() => {
    personas.value = props.personas;
    console.log(personas);
    load.value = true;
    table.value.dt.on('deselect', handleRowSelectionDelete);
    table.value.dt.on('deselect', handleRowSelection);
});


/**************************************************************************************************************** */

    const form = ref({
        id:'',
        fecha:'',
        departamento:'',
        provincia:'',
        distrito:'',
        direccion:'',
        celular:'',
        ruc:'',
        razon_social:'',
        correo:'',
    });
/**************************************************************************************************************** */
    const formEdit = ref({
        id:'',
        fecha:'',
        departamento:'',
        provincia:'',
        distrito:'',
        direccion:'',
        celular:'',
        ruc:'',
        razon_social:'',
        correo:'',
    });
    
    window.JSZip = JsZip;
    DataTable.use(ButtonsHtml5);
    DataTable.use(Select);

/**************************************************************************************************************** */
columns.value = [{ data:null,render:function(data,type,row,meta)
    {return (meta.row+1)}},
    {data:'dni'},
    {data:'departamento'},
    {data:'provincia'},
    {data:'distrito'},
    {data:'direccion'},
   ];
/**************************************************************************************************************** */
buttons.value = [
    {
        title: 'Clientes',
        extend: 'excelHtml5',
        text: '<i class="fa-solid fa-file-excel"></i> Excel',
        className: 'bg-green-500 text-white px-4 py-2 rounded my-2 hover:bg-green-600 focus:outline-none'
    },
    {
        title: 'Clientes',
        extend: 'pdfHtml5',
        text: '<i class="fa-solid fa-file-pdf"></i> PDF',
        className: 'bg-blue-500 text-white px-4 py-2 rounded my-2 hover:bg-blue-600 focus:outline-none'
    },
    {
        title: 'Clientes',
        extend: 'print',
        text: '<i class="fa-solid fa-print"></i> PRINT',
        className: 'bg-gray-800 text-white px-4 py-2 rounded my-2 hover:bg-gray-900 focus:outline-none'
    },
    {
        title: 'Clientes',
        extend: 'copy',
        text: '<i class="fa-solid fa-copy"></i> COPY',
        className: 'bg-gray-400 text-white px-4 py-2 rounded my-2 hover:bg-gray-500 focus:outline-none'
    }
];   
/**************************************************************************************************************** */
const deleteCliente = () => {
    const selectedRows = table.value.dt.rows({ selected: true }).data().toArray();
    if (selectedRows.length > 0) {
        const id = selectedRows[0].id;
        const contacto = selectedRows[0].contacto;
        const alert = Swal.mixin({ buttonStyling: true });
        alert.fire({
            title: '¿Está seguro de querer borrar el registro ' + contacto+':' + id +'?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i className="fa fa-solid fa-check"></i> Sí, borrar',
            cancelButtonText: '<i className="fa fa-solid fa-check"></i> Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                confirmation(name, 'http://localhost:8000/api/v1/delete/' + id, '/listbet');
            }
        });
    } else {
        let desc = 'Debe seleccionar una fila antes de poder borrarla';
        show_alert(desc, 'error', '');
    }
};
/**************************************************************************************************************** */
/******************************************Testear Nuevamente**************************************************** */
/**************************************************************************************************************** */
const openModal = (title) => 
{    
    modalTitle.value = title;
    showModal.value = true;  
    console.log('mensjae de exito');            
};
/**************************************************************************************************************** */
const openModalEdit = (title) => {

    const selectedRowsCount = table.value.dt.rows({ selected: true }).count();                
    if (selectedRowsCount === 0) {
        // Mostrar una alerta si no se ha seleccionado ninguna fila
        show_alert('Debe seleccionar una fila antes de editar', 'error', '');
        return;
    }
    const selectedRowsData = table.value.dt.rows({ selected: true }).data().toArray()[0];
    if (!selectedRowsData) {
        // Mostrar una alerta si selectedRowsData es undefined
        show_alert('No se encontraron datos para la fila seleccionada', 'error', '');
        return;
    }
        
    personas.value.fecha=selectedRowsData.fecha
    personas.value.dni=selectedRowsData.dni
    personas.value.medio_de_contacto=selectedRowsData.medio_de_contacto
    personas.value.medio_de_respuesta=selectedRowsData.medio_de_respuesta
    personas.value.como_llego_a_la_marca=selectedRowsData.como_llego_a_la_marca
    personas.value.tipo_negocio=selectedRowsData.tipo_negocio
    personas.value.estado=selectedRowsData.estado
    personas.value.respuesta_asesor=selectedRowsData.respuesta_asesor
    personas.value.primer_contacto=selectedRowsData.primer_contacto
    personas.value.segundo_contacto=selectedRowsData.segundo_contacto
    personas.value.tercer_contacto=selectedRowsData.tercer_contacto
    personas.value.contacto=selectedRowsData.contacto
    personas.value.realizo_la_venta=selectedRowsData.realizo_la_venta
    personas.value.futuro_socio=selectedRowsData.futuro_socio

    console.log(personas);
    modalTitleEdit.value = title;
    showModalEdit.value = true;  

};
/**************************************************************************************************************** */
const handleRowSelection = (event) => {

    const selectedRows = table.value.dt.rows({ selected: true }).count();

// Si hay filas seleccionadas, establecer filaSeleccionada en true
filaSeleccionada.value = selectedRows > 0;
};
/**************************************************************************************************************** */
const handleRowSelectionDelete = (event) => {

const selectedRows = table.value.dt.rows({ selected: true }).count();

// Si hay filas seleccionadas, establecer filaSeleccionada en true
filaSeleccionada.value = selectedRows > 0;
};
/**************************************************************************************************************** */
const update = () => {
    // Obtenemos las filas seleccionadas en la tabla
    const selectedRows = table.value.dt.rows({ selected: true }).data().toArray();        
    // Verificamos si se ha seleccionado al menos una fila

    if (selectedRows.length > 0) {
        // Obtenemos los datos de la primera fila seleccionada
        const selectedRowData = selectedRows[0];
            
        formEdit.value.fecha=selectedRowData.fecha
        formEdit.value.dni=selectedRowData.dni
        formEdit.value.medio_de_contacto=selectedRowData.medio_de_contacto
        formEdit.value.medio_de_respuesta=selectedRowData.medio_de_respuesta
        formEdit.value.como_llego_a_la_marca=selectedRowData.como_llego_a_la_marca
        formEdit.value.tipo_negocio=selectedRowData.tipo_negocio
        formEdit.value.estado=selectedRowData.estado
        formEdit.value.respuesta_asesor=selectedRowData.respuesta_asesor
        formEdit.value.primer_contacto=selectedRowData.primer_contacto
        formEdit.value.segundo_contacto=selectedRowData.segundo_contacto
        formEdit.value.tercer_contacto=selectedRowData.tercer_contacto
        formEdit.value.contacto=selectedRowData.contacto
        formEdit.value.realizo_la_venta=selectedRowData.realizo_la_venta
        formEdit.value.futuro_socio=selectedRowData.futuro_socio
        
        console.log(formEdit);
        //  sendRequest('PUT',formEdit.value,('http://localhost:8000/api/v1/client/'+id),'');

    } else {
        // Si no se ha seleccionado ninguna fila, mostramos un mensaje de advertencia o manejo de la situación
        let desc = 'debe selccionar uan fila antes de poder editarla'
        show_alert(desc, 'error', '')
    }
};
/**************************************************************************************************************** */
const save = () => {

    console.log(form);
    // sendRequest('POST',form.value,'http://localhost:8000/api/v1/create','listbet');          
    form.value.fecha
    form.value.dni
    form.value.medio_de_contacto
    form.value.medio_de_respuesta
    form.value.como_llego_a_la_marca
    form.value.tipo_negocio
    form.value.estado
    form.value.respuesta_asesor
    form.value.primer_contacto
    form.value.segundo_contacto
    form.value.tercer_contacto
    form.value.contacto
    form.value.realizo_la_venta
    form.value.futuro_socio        
    showModal.value = false;

}
/**************************************************************************************************************** */

</script>

<template>
    <Head title="Persons Index" />

    <AdminLayout>
        <!-- ************************************************************************************************************************************** --> 
        <div className="flex justify-center">
            <div className="w-full">
                <div className="bg-blue-400 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <div className="flex justify-around items-center"> <!-- Contenedor para los botones -->
                        <button v-if="!filaSeleccionada" data-modal-target="default-modal" @click="openModal('Crear')" data-modal-toggle="default-modal" className="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Crear Registro 
                        </button>
                        <button  @click="openModalEdit('Editar')" className=" btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" > 
                            <i className="fa-solid fa-circle-plus mx-1"></i>Editar Registro
                        </button>
                        <button  @click="deleteCliente()" className="btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i className="fa-solid fa-circle-plus mx-1"></i> Borrar Registro
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ************************************************************************************************************************************** -->         
        <div className="border px-10 py-5  border-primary-400 rounded-md  mt-3">    
            <div className="md:col-span-12 lg:col-span-12 col-span-12">
                <!-- <div className="buttons">
                    <Button v-for="(button, index) in buttons.value" :key="index"
                            :button-text="button.text"
                            :icon="button.text.match(/fa-solid (fa-\w+)/)[1]"
                            :button-class="button.className"
                            :handle-click="handleButtonClick(button.extend)">
                    </Button>
                </div> -->
                <div className="table-responsive my-5">
                    <DataTable 
                    :data="personas" 
                    :columns="columns" 
                    ref="table"
                  class="display"
                    :options="{ 
                        select:true,
                        responsive: true, 
                        autoWidth: false, 
                        dom: 'Bfrtip',
                        buttons: buttons,
                        pageLength: 10
                    }"
                        @select="handleRowSelection"
                    >
                        <thead>
                            <tr>
                                <th className="px-4 py-2">Id</th>
                                <th className="px-4 py-2">DNI</th>
                                <th className="px-4 py-2">Departamento</th>
                                <th className="px-4 py-2">Provincia</th>
                                <th className="px-4 py-2">Distrito</th>
                                <th className="px-4 py-2">Dirección</th>
                            </tr>
                        </thead>
                    </DataTable>
                    

                    
                </div>
            </div>

        </div>
        <!-- ************************************************************************************************************************************** -->
        <!-- MODAL EDIT  -->
        <div v-show="showModalEdit" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ modalTitleEdit }}
                    </h3>
                    <button @click="showModalEdit= false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
               </div>
             
               <div class="p-4 space-y-4 overflow-y-auto">
                    <form @submit.prevent="update" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
                        
                        <div className="my-2">
                            <h2 className="text-xl font-thin mb-4">Título fino</h2>
                        </div>
                        <div className="mb-4">
                            <label for="dni" className="block mb-1">DNI</label>
                            <input type="text" id="dni" className="form-input w-full" v-model="personas.dni">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="departamento" className="block mb-1">DEPARTAMENTO</label>
                            <input type="text" id="departamento" className="form-input w-full" v-model="personas.departamento">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="provincia" className="block mb-1">PROVINCIA</label>
                            <input type="text" id="provincia" className="form-input w-full" v-model="personas.provincia">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="estado" className="block mb-1">ESTADO</label>
                            <input type="text" id="estado" className="form-input w-full" v-model="personas.estado">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="distrito" className="block mb-1">DISTRITO</label>
                            <input type="text" id="distrito" className="form-input w-full" v-model="personas.distrito">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="direccion" className="block mb-1">DIRECCIÓN</label>
                            <input type="text" id="direccion" className="form-input w-full" v-model="personas.direccion">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="celular" className="block mb-1">CELULAR</label>
                            <input type="text" id="celular" className="form-input w-full" v-model="personas.celular">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="ruc" className="block mb-1">RUC</label>
                            <input type="text" id="ruc" className="form-input w-full" v-model="personas.ruc">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="razon_social" className="block mb-1">RAZON SOCIAL</label>
                            <input type="text" id="razon_social" className="form-input w-full" v-model="personas.razon_social">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="correo" className="block mb-1">CORREO</label>
                            <input type="text" id="correo" className="form-input w-full" v-model="personas.correo">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                    

                        <div class="flex items-center justify-end p-4 border-t">
                    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
                    <button @click="showModalEdit = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
                </div>
            </form>
                </div> 
            </div>
        </div>
      
        <!-- ************************************************************************************************************************************** -->

        <!-- MODAL -->
     <div v-show="showModal" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ modalTitle }}
                    </h3>
                    <button @click="showModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
                </div>
                <div class="p-4 space-y-4 overflow-y-auto">
                    <form @submit.prevent="update" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
                        
                        <div className="my-2">
                            <h2 className="text-xl font-thin mb-4">Título fino</h2>
                        </div>
                        <div className="mb-4">
                            <label for="dni" className="block mb-1">DNI</label>
                            <input type="text" id="dni" className="form-input w-full" v-model="form.dni">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="departamento" className="block mb-1">DEPARTAMENTO</label>
                            <input type="text" id="departamento" className="form-input w-full" v-model="form.departamento">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="provincia" className="block mb-1">PROVINCIA</label>
                            <input type="text" id="provincia" className="form-input w-full" v-model="form.provincia">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="estado" className="block mb-1">ESTADO</label>
                            <input type="text" id="estado" className="form-input w-full" v-model="form.estado">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="distrito" className="block mb-1">DISTRITO</label>
                            <input type="text" id="distrito" className="form-input w-full" v-model="form.distrito">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="direccion" className="block mb-1">DIRECCIÓN</label>
                            <input type="text" id="direccion" className="form-input w-full" v-model="form.direccion">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="celular" className="block mb-1">CELULAR</label>
                            <input type="text" id="celular" className="form-input w-full" v-model="form.celular">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="ruc" className="block mb-1">RUC</label>
                            <input type="text" id="ruc" className="form-input w-full" v-model="form.ruc">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="razon_social" className="block mb-1">RAZON SOCIAL</label>
                            <input type="text" id="razon_social" className="form-input w-full" v-model="form.razon_social">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                        <div className="mb-4">
                            <label for="correo" className="block mb-1">CORREO</label>
                            <input type="text" id="correo" className="form-input w-full" v-model="form.correo">
                            <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
                        </div>
                    

                        <div class="flex items-center justify-end p-4 border-t">
                    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
                    <button @click="showModalEdit = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
                </div>
            </form>
                </div>
            
            </div>
        </div> 


    </AdminLayout>

</template>



<style>

        /* Estilos para alinear el componente de búsqueda a la derecha */
        .dt-search {
            float: right; /* Colocar el componente a la derecha */
            margin-right: 20px;
            margin-top: 1rem; /* Ajustar el margen derecho según sea necesario */

            margin-bottom: 1rem; /* Ajustar el margen derecho según sea necesario */
        }

        /* Estilos para alinear los botones de paginación a la derecha */
        .dt-paging {
            text-align: center; /* Alinear los botones a la derecha */
            margin-top: 10px; /* Ajustar el margen superior según sea necesario */
        }

        /* Estilos para los botones de paginación */
        .dt-paging-button {
            margin-left: 5px; /* Añadir un pequeño espacio entre los botones */
            /* Otros estilos según sea necesario */
        }

</style>