<?php
include_once ('menu.php');
include_once ('../../modelo/conexion.php');
$ob=new conexion();
$sql="select * from cursado join curso c on cursado.Curso_id_Curso = c.id_Curso
join estudiante e on cursado.estudiante_id_estudiante = e.id_estudiante and cursado.estudiante_persona_id_persona = e.persona_id_persona
join persona p on e.persona_id_persona = p.id_persona where activo =1";
$datos=$ob->con_retorno($sql);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Listar</h1>
            <p>Cursos Estudiantes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Inicio</li>
            <li class="breadcrumb-item"><a href="#">Estudios</a></li>
        </ul>
    </div>
<div class="card">
    <div class="card-header"><h3><center>Listado de Registros en Cursos</center></h3></div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre del Curso</th>
                <th>Estudiante</th>
            </tr>
            </thead>
            <tbody>
<?php
while ($row=mysqli_fetch_assoc($datos)) {
    echo "
    <tr>
        <td>$row[Curso_id_Curso]</td>
        <td style='text-transform: capitalize;'>$row[nombrecurso]</td>
        <td style='text-transform: capitalize;'>$row[nombre] $row[papellido] $row[sapellido]</td>
    </tr>
";
        }?>
    </div>
</div>

</main>
<?php
if(@$_SESSION['error']=="exitoso"){
echo "<script>swal(
        'Curso Iniciado!',
        ' Inicializacion exitosa!',
        'success'
    )</script>";
$_SESSION['error']=" ";
}
elseif(@$_SESSION['error']=="falla"){
echo "<script>swal(
        'Falla En Iniciar!',
        'Ya existe o ingreso datos invalidos!',
        'error'
    )</script>";
$_SESSION['error']=" ";
}
?>
