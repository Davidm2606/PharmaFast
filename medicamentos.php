<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IVENTARIO MEDICAMENTOS</title>

</head>
<body>
    <h2>MEDICAMENTOS DISPONIBLES</h2>
    
    
    <table id="dg" title="Medicamentos" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/acceder.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="codigo" width="50">Codigo</th>
                <th field="nombre" width="50">Nombre</th>
                <th field="marca" width="50">Marca</th>
                <th field="cantidad" width="50">Cantidad</th>
                <th field="precio" width="50">Precio</th>
                </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Medicamento</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Medicamento</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Medicamento</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="reporte()">Reporte</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="reporte1()">Reporte CSV</a>
        <br><a>Buscar: </a> <input onkeyup="buscar()" name="buscar" id="buscar" type="text"> 
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Informacion Medicamentos</h3>
            <div style="margin-bottom:10px">
                <input name="codigo" class="easyui-textbox" required="true" label="Codigo:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="marca" class="easyui-textbox" required="true" label="Marca:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="cantidad" class="easyui-textbox" required="true" label="Cantidad:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="precio" class="easyui-textbox" required="true" label="Precio:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Medicamento');
            $('#fm').form('clear');
            url = 'models/guardar.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Medicamento');
                 $('#fm').form('load',row);
                 url = 'models/editar.php?codigo='+row.codigo;
               
            }
        }

             function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirmar','Estas seguro que quieres eliminar?',function(r){
                    if (r){
                        $.post('models/eliminar.php',{codigo:row.codigo},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                              //  $.messager.show({    // show error message
                              //      title: 'Error',
                               //     msg: result.errorMsg
                              //  });
                            }
                            $('#dg').datagrid('reload');  
                        },'json');
                    }
                });
            }
        }


    function reporte() {
            document.getElementById("reporte").src="models/reportepdf.php";
        }

        function reporte1() {
            document.getElementById("reporte").src="models/reportecsv.php";
        }

    function buscar() {
            var nombre=document.getElementById('buscar').value;
            $('#dg').datagrid({url:"models/buscar.php?nombre="+nombre});
            $('#buscar').focus();
            
        }
    </script> 
     <section>
        <br>
<iframe id="reporte" src="" style="width:53vw;height:60bh;border:none" ></iframe>
    </section>
</body>
</html>