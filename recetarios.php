<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>RECETARIOS</title>

</head>
<body>
    <h2>RECETAS DE PACIENTES</h2>

    
    <table id="dg" title="Recetarios" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/acceder1.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="id" width="50">ID receta</th>
                <th field="cedula" width="50">Cedula paciente</th>
                <th field="detalle" width="50">Descripcion</th>
                <th field="valor" width="50">Valor receta</th>
                </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nueva receta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar receta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar receta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="reporte()">Reporte</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="reporte1()">Reporte CSV</a>
        <br><a>Buscar: </a> <input onkeyup="buscar()" name="buscar" id="buscar" type="text">
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Informacion Estudiante</h3>
            <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" required="true" label="ID receta:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="cedula" class="easyui-textbox" required="true" label="Cedula Paciente:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="detalle" class="easyui-textbox" required="true" label="Detalle receta:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="valor" class="easyui-textbox" required="true" label="Valor receta:" style="width:100%">
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
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Receta');
            $('#fm').form('clear');
            url = 'models/guardar1.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Receta');
                 $('#fm').form('load',row);
                 url = 'models/editar1.php?id='+row.id;
               
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
                        $.post('models/eliminar1.php',{id:row.id},function(result){
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
            document.getElementById("reporte").src="models/reportepdf1.php";
        }
      
        
        function reporte1() {
            document.getElementById("reporte").src="models/reportecsv1.php";
        }
        

    function buscar() {
            var id=document.getElementById('buscar').value;
            $('#dg').datagrid({url:"models/buscar1.php?id="+id});
            $('#buscar').focus();
            
        }
    </script> 
     <section>
        <br>
<iframe id="reporte" src="" style="width:53vw;height:60bh;border:none" ></iframe>
    </section>
</body>
</html>