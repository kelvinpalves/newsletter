<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        {include file="default/header.tpl" }
        <link rel="stylesheet" href="plugins/summernote/dist/summernote.css"/>
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
                        <li>
                            Assinatura
                        </li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Assinatura</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/assinatura/salvar" >                                    
                                        <div class="box-body">

                                            {if isset($assinatura)}
                                                <input id="id" type="hidden" class="form-control" id="codigo" name="assinatura_id" value="{$assinatura->getId()}">
                                            {/if} 

                                            <div class="row">
                                                <div class="col-md-12"><div id="summernote" >{if isset($assinatura)}{$assinatura->getHtmlAssinatura()}{/if}</div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="overlay">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {include file="default/footer.tpl" }
    </div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
    {include file="default/javascript.tpl" }
    <script src="plugins/summernote/dist/summernote.js"></script>
    <script src="plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <script src="plugins/summernote/dist/summernote-ext-template.js"></script>
    <script type="text/javascript" src="resource/novoAssinatura.js" ></script>
</body>
</html>
