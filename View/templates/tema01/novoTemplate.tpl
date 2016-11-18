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
                        <li class="active">
                            <a href="/newsletter/template/lista">Template</a>
                        </li>
                        <li>
                            Novo
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Novo Template</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/template/salvar" >                                    
                                        <div class="box-body">

                                            {if isset($template)}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="codigo">Código</label>
                                                            <input id="id" type="text" readonly="true" class="form-control" id="codigo" name="template_id" value="{$template->getId()}">
                                                        </div>
                                                    </div>
                                                </div>
                                            {/if} 

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="titulo">Assunto</label>
                                                        <input class="form-control" id="titulo" type="text" name="template_titulo" placeholder="Informe o título do template" {if isset($template)}value="{$template->getTitulo()}"{/if} required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="summernote">
                                                    {if isset($template)}{$template->getTexto()}{/if}
                                                </div>    
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
    <script type="text/javascript" src="resource/novoTemplate.js" ></script>
</body>
</html>
