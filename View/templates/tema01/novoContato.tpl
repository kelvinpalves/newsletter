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
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="/newsletter/contato/lista">Contato</a>
                        </li>
                        <li>
                            Novo
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Novo Contato</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/contato/salvar" >                                    
                                        <div class="box-body">
                                            
                                            {if isset($contato)}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="codigo">Código</label>
                                                        <input id="id" type="text" readonly="true" class="form-control" id="codigo" name="contato_id" value="{$contato->getId()}">
                                                    </div>
                                                </div>
                                            </div>
                                            {/if} 
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" class="form-control" id="email" name="contato_email" placeholder="Informe um e-mail" {if isset($contato)}value="{$contato->getEmail()}"{/if} required="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-flat btn-primary">Salvar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {include file="default/footer.tpl" }
        </div>
        {include file="default/javascript.tpl" }
        <script type="text/javascript" src="resource/novoContato.js" ></script>
    </body>
</html>
