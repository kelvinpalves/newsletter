<!DOCTYPE html>
<html>
    <head>
        {include file="default/header.tpl" }
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.min.js"/>
        <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"/>
        <link rel="stylesheet" href="plugins/iCheck/all.css">
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
                            Envio
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Lista de Templates e Contatos</h3></div>
                                    <div class="col-md-6 text-right">Total Selecionado: <span id="totalSelecionado">0</span></div>
                                </div>
                                <form id="formulario" role="form" class="submit" action="/newsletter/envio/enviar" >                                    
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="templates">Template</label>
                                                    <select name="template_id" id="templates" class="form-control">
                                                        {html_options values=$template_ids selected=$template_id output=$template_titulos}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped tabela-acoes table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tabela">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 15%;">Código</th>
                                                            <th>E-mail</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Enviar E-mails</button>
                                        <button type="button" class="btn btn-flat btn-primary" onclick="marcar()">Marcar/Desmarcar Todos</button>
                                    </div>
                                </form>
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
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script type="text/javascript" src="resource/envio.js" ></script>
    </body>
</html>
