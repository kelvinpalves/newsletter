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
                            Importar
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Importar Contatos</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/contato/importarJSON" >                                    
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputJson">JSON</label>
                                                        <textarea readonly="true" rows="15" class="form-control" id="inputJson" name="json" placeholder="Cole o json de contatos" required="true" >{$json}</textarea>
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
        <script type="text/javascript" src="resource/importarContato.js" ></script>
    </body>
</html>
