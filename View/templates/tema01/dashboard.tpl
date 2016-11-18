<!DOCTYPE html>
<html>
    <head>
        {include file="default/header.tpl" }
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
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-th"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Plano</span>
                                    <span class="info-box-number">{$cliente->getTotalEmail()}/mês</span>
                                    Total de E-mails contratados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-send"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Enviado</span>
                                    <span class="info-box-number totalEnviadoMes">{$totalEnviadoMes}/mês</span>
                                    Total de E-mails Enviados no Mês.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-envelope-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Restante</span>
                                    <span class="info-box-number totalRestanteMes">{$totalRestanteMes}/mês</span>
                                    Total de E-mails Restantes.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-gray">
                                <span class="info-box-icon"><i class="fa fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Contato</span>
                                    <span class="info-box-number">{$totalContato}</span>
                                    Total de Contatos Registrados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-maroon">
                                <span class="info-box-icon"><i class="fa fa-history"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Totalizador</span>
                                    <span class="info-box-number totalGeral">{$totalGeral}</span>
                                    Total Geral de E-mails Enviados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-teal">
                                <span class="info-box-icon"><i class="fa fa-edit"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Templates</span>
                                    <span class="info-box-number">{$totalTemplate}</span>
                                    Total de Templates Criados.
                                </div>
                            </div>
                        </div>


{*                        <div class="col-md-4">
                            <div class="info-box bg-navy">
                                <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Serviço</span>
                                    <span class="info-box-number servico">{$status}</span>
                                    Status do processo de envio.
                                </div>
                            </div>
                        </div>*}

                        <div class="col-md-4">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Fila de Envio</span>
                                    <span class="info-box-number totalFilaEnvio">{$totalFilaEnvio}</span>
                                    Total de E-mails na Fila de Envio.
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
            {include file="default/footer.tpl" }
        </div>
        {include file="default/javascript.tpl" }
        <script src="resource/dashboard.js" ></script>
    </body>
</html>
