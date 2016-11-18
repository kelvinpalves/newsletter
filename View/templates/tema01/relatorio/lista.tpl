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

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        001 - Relatório de E-mails Enviados Por Período
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        Relatório detalhado e quantitativo de e-mails enviado durante um período determinado.
                                    </p>
                                    <p>
                                        <a class="btn btn-flat btn-primary" href="/newsletter/r001/visualizar">Visualizar Relatório</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        002 - Relatório Lidos X Não Lidos
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>Relatório quantitativo e estatistico de e-mails enviados, efetuando a comparação entre lidos e não lidos.</p>
                                    
                                    <p>
                                        <a class="btn btn-flat btn-primary" href="/newsletter/r002/visualizar">Visualizar Relatório</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
            {include file="default/footer.tpl" }
        </div>
        {include file="default/javascript.tpl" }
    </body>
</html>
