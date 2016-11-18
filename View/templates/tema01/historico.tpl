<!DOCTYPE html>
<html>
    <head>
        {include file="default/header.tpl" }
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.min.js"/>
        <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"/>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            {include file="default/navbar.tpl" }
            {include file="default/aside.tpl" }
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        {$titulo}
                        <small>{$subtitulo}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            Histórico
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Lista de E-mails Enviados</h3></div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped tabela-acoes table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tabela">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%;">Código</th>
                                                <th>Campanha</th>
                                                <th>Contato</th>
                                                <th>Situação</th>
                                                <th style="width: 20%;">Data/Hora de Envio</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {include file="default/footer.tpl" }
        </div>
        {include file="default/javascript.tpl" }
        <script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js" ></script>
        <script type="text/javascript" src="plugins/datatables/dataTables.bootstrap.min.js" ></script>
        <script type="text/javascript" src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" ></script>
        <script type="text/javascript" src="plugins/dateformat.js" ></script>
        <script type="text/javascript" src="resource/historico.js" ></script>
    </body>
</html>
